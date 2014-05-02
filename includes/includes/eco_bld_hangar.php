<?php

function eco_hangar_is_building($que)
{
  return $que['in_que_abs'][STRUC_FACTORY_HANGAR] ? true : false;
}

/*
function eco_bld_hangar_clear($planet, $action)
{
  doquery('START TRANSACTION;');
  $planet = doquery("SELECT * FROM {{planets}} WHERE `id` = '{$planet['id']}' LIMIT 1 FOR UPDATE;", '', true);

  $restored_resources = array();
  $hangar_que = eco_que_str2arr($planet['b_hangar_id']);
  $hangar_loop = count($hangar_que) - 1;
  for($i = $hangar_loop; $i >= ($action == 'trim' ? $hangar_loop : 0); $i--)
  {
    $unit_data = get_unit_param($hangar_que[$i][0]);
    foreach($unit_data['cost'] as $resource_id => $resource_amount)
    {
      if(!$resource_amount || !intval($resource_id))
      {
        continue;
      }
      $restored_resources[$resource_id] += $hangar_que[$i][1] * $resource_amount;
    }
    unset($hangar_que[$i]);
  }

  $query = array();
  foreach($restored_resources as $resource_id => $resource_amount)
  {
    $resource_db_name = get_unit_param($resource_id, P_NAME);
    $query[] = "`{$resource_db_name}` = `{$resource_db_name}` + {$resource_amount}";
  }
  $hangar_que = eco_que_arr2str($hangar_que);
  $query[] = "`b_hangar_id` = '{$hangar_que}'";
  if(!$hangar_que)
  {
    $query[] = "`b_hangar` = 0";
  }
  $query = implode(',', $query);
  doquery("UPDATE `{{planets}}` SET {$query} WHERE `id` = '{$planet['id']}' LIMIT 1;");
  doquery('COMMIT;');

  sys_redirect("{$_SERVER['PHP_SELF']}?mode=" . sys_get_param_str('mode'));
}
*/

function eco_bld_hangar($que_type, $user, &$planet, $que)
{
  global $lang;

  if(mrc_get_level($user, $planet, STRUC_FACTORY_HANGAR) == 0)
  {
    message($lang['need_hangar'], $lang['tech'][STRUC_FACTORY_HANGAR]);
  }

  $page_mode = $que_type == SUBQUE_FLEET ? 'fleet' : 'defense';
  switch(sys_get_param_str('action'))
  {
    case 'clear':que_delete($que_type, $user, $planet, true);break;
    case 'trim' :que_delete($que_type, $user, $planet, false);break;
    //case 'build':$operation_result = que_build($user, $planet);break;
    //case 'build':$operation_result = eco_bld_tech_research($user, $planet);break;
  }

  if(sys_unit_arr2str(sys_get_param('fmenge')))
  {
    $operation_result = que_build($user, $planet);
  }

  $page_error = '';
  $sn_data_group = sn_get_groups($page_mode);

  $ques = que_get($que_type, $user['id'], $planet['id']);
  $que = &$ques['ques'][$que_type][$user['id']][$planet['id']];
  $in_que = &$ques['in_que'][$que_type][$user['id']][$planet['id']];
  $silo_capacity_free = mrc_get_level($user, $planet, STRUC_SILO) * get_unit_param(STRUC_SILO, P_CAPACITY);

  $template = gettemplate("buildings_hangar", true);

  $TabIndex  = 0;
  foreach($sn_data_group as $unit_id)
  {
    $unit_info = get_unit_param($unit_id);
    $build_data = eco_get_build_data($user, $planet, $unit_id);

    if($build_data['RESULT'][BUILD_CREATE] == BUILD_REQUIRE_NOT_MEET)
    {
      continue;
    }

    $unit_message = '';
    $ElementCount  = mrc_get_level($user, $planet, $unit_id);
    // Restricting $can_build by resources on planet and (where applicable) with max count per unit
    $can_build     = $unit_info[P_MAX_STACK] ? max(0, $unit_info[P_MAX_STACK] - $in_que[$unit_id] - $ElementCount) : $build_data['CAN'][BUILD_CREATE];
    // Restricting $can_build by free silo capacity
    $can_build     = ($unit_is_missile = in_array($unit_id, sn_get_groups('missile'))) ? min($can_build, floor($silo_capacity_free / $unit_info[P_UNIT_SIZE])) : $can_build;
    if(!$can_build)
    {
      if(!$build_data['CAN'][BUILD_CREATE])
      {
        $unit_message = $lang['sys_build_result'][BUILD_NO_RESOURCES];
      }
      elseif($unit_is_missile && $silo_capacity_free < $unit_info[P_UNIT_SIZE])
      {
        $unit_message = $lang['b_no_silo_space'];
      }
      elseif($unit_info[P_MAX_STACK])
      {
        $unit_message = $lang['only_one'];
      }
    }
    else
    {
      $TabIndex++;
    }

    $temp[RES_METAL]     = floor($planet['metal'] - $build_data[BUILD_CREATE][RES_METAL]); // + $fleet_list['own']['total'][RES_METAL]
    $temp[RES_CRYSTAL]   = floor($planet['crystal'] - $build_data[BUILD_CREATE][RES_CRYSTAL]); // + $fleet_list['own']['total'][RES_CRYSTAL]
    $temp[RES_DEUTERIUM] = floor($planet['deuterium'] - $build_data[BUILD_CREATE][RES_DEUTERIUM]); // + $fleet_list['own']['total'][RES_DEUTERIUM]

    $template->assign_block_vars('production', array(
      'ID'                => $unit_id,
      'NAME'              => $lang['tech'][$unit_id],
      'DESCRIPTION'       => $lang['info'][$unit_id]['description_short'],
      'LEVEL'             => $ElementCount,
      'LEVEL_OLD'         => mrc_get_level($user, $planet, $unit_id),
      'LEVEL_CHANGE'      => $que['in_que'][$unit_id],

      'BUILD_CAN'         => $can_build,
      'TIME'              => pretty_time($build_data[RES_TIME][BUILD_CREATE]),
      'METAL'             => $build_data[BUILD_CREATE][RES_METAL],
      'CRYSTAL'           => $build_data[BUILD_CREATE][RES_CRYSTAL],
      'DEUTERIUM'         => $build_data[BUILD_CREATE][RES_DEUTERIUM],

      'METAL_PRINT'       => pretty_number($build_data[BUILD_CREATE][RES_METAL], true, $planet['metal']),
      'CRYSTAL_PRINT'     => pretty_number($build_data[BUILD_CREATE][RES_CRYSTAL], true, $planet['crystal']),
      'DEUTERIUM_PRINT'   => pretty_number($build_data[BUILD_CREATE][RES_DEUTERIUM], true, $planet['deuterium']),

      'DESTROY_CAN'       => $build_data['CAN'][BUILD_DESTROY],
      'DESTROY_TIME'      => pretty_time($build_data[RES_TIME][BUILD_DESTROY]),
      'DESTROY_METAL'     => $build_data[BUILD_DESTROY][RES_METAL],
      'DESTROY_CRYSTAL'   => $build_data[BUILD_DESTROY][RES_CRYSTAL],
      'DESTROY_DEUTERIUM' => $build_data[BUILD_DESTROY][RES_DEUTERIUM],

      'METAL_REST'        => pretty_number($temp[RES_METAL], true, true),
      'CRYSTAL_REST'      => pretty_number($temp[RES_CRYSTAL], true, true),
      'DEUTERIUM_REST'    => pretty_number($temp[RES_DEUTERIUM], true, true),
      'METAL_REST_NUM'    => $temp[RES_METAL],
      'CRYSTAL_REST_NUM'  => $temp[RES_CRYSTAL],
      'DEUTERIUM_REST_NUM'=> $temp[RES_DEUTERIUM],

      'ARMOR'  => pretty_number($unit_info[P_ARMOR]),
      'SHIELD' => pretty_number($unit_info[P_SHIELD]),
      'WEAPON' => pretty_number($unit_info[P_ATTACK]),

      'TABINDEX' => $TabIndex,

      'MESSAGE' => $unit_message,
    ));
  }
//$hangar_busy
  $template->assign_vars(array(
    'noresearch' => $NoFleetMessage,
    'error_msg'  => $page_error,
    'MODE'       => $que_type,

    'QUE_ID'     => $que_type,
    'TIME_NOW'   => SN_TIME_NOW,
    'HANGAR_BUSY' => eco_hangar_is_building($que),
    'QUE_HAS_PLACE' => empty($que) || count($que) < que_get_max_que_length($user, $planet, $que_type),
  ));

  // tpl_assign_hangar($que_type, $planet, $template);

  // $ques = que_get($que_type, $user['id'], $planet['id']);

  que_tpl_parse($template, $que_type, $user, $planet);


  display(parsetemplate($template), $lang[$page_mode]);
}
