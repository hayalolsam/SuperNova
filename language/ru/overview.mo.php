<?php

/*
#############################################################################
#  Filename: overview.mo
#  Project: SuperNova.WS
#  Website: http://www.supernova.ws
#  Description: Massive Multiplayer Online Browser Space Startegy Game
#
#  Copyright © 2009 Gorlum for Project "SuperNova.WS"
#  Copyright © 2009 MSW
#############################################################################
*/

/**
*
* @package language
* @system [Russian]
* @version 39b14.4
*
*/

/**
* DO NOT CHANGE
*/

if (!defined('INSIDE')) die();


//$lang = array_merge($lang,
//$lang->merge(
$a_lang_array = (array(
  'ov_hack_alert' => 'Попытка взлома БД!!!',
  'ov_you_have' => 'У вас',
  'ov_new_message' => 'одно новое сообщение',
  'ov_new_messages' => 'новых сообщений',
  'cancel' => 'Отменить',
  'Planet_menu' => 'Строительство на планете',
  'Planet' => 'Планета',
  'Moon' => 'Луна',
  'Have_new_level_mineur' => 'За достижения в экономике Вы выиграли очко развития офицеров!',
  'Have_new_level_raid' => 'За успешные атаки Вы выиграли очко развития офицеров!',
  'Server_time' => 'Время',
  'Left_time' => 'Оставшееся время',
  'Now_build' => 'Сейчас строится',
  'Events' => 'События',
  'Free' => 'нет заданий',
  'Diameter' => 'Диаметр',
  'fields' => 'Сектора',
  'Developed_fields' => 'Занято секторов',
  'max_eveloped_fields' => 'Максимальное количество секторов',
  'Temperature' => 'Температура',
  'min_avg_max' => 'мин/ср/макс',
  'approx' => 'приблизительно',
  'to' => 'to',
  'Centigrade' => 'C',
  'Position' => 'Координаты',
//  'Buildings' => 'Строения',
  'Fleet' => 'Флот',
  'Research' => 'Исследования',
  'Total' => 'Всего',
  'Rank' => 'Место',
  'of' => 'из',
  'Miner' => 'Геолог',
  'Raider' => 'Рейдер',
  'Debris_Field' => 'Debris Field',
  'rename_and_abandon_planet' => 'Управление планетой',
  'functions' => 'Функции',
  'coords' => 'Координаты',
  'your_planet' => 'Ваша планета',
  'colony_abandon' => 'Покинуть колонию',
  'deleteplanet' => 'Удалить планету!',
  'security_query' => 'Система безопасности',
  'name' => 'Имя',
  'namer' => 'Сменить название',
//  'password' => 'Пароль',
  'confirm_planet_delete' => 'Подтвердите удаление планеты',
  'confirmed_with_password' => 'Подтвердите с паролем',
  'ov_delete_ok' => 'Колония успешно удалена',
  'ov_delete_wrong_planet' => 'Планета не может быть оставлена! Вы пытаетесь покинуть вашу основную планету или вы сменили текущую планету в другом окне браузера.',
  'ov_delete_wrong_pass' => 'Неверный пароль!',
  'MembersOnline' => 'Игроков',
  'ov_fleet_list' => 'График движения флотов',
  'ov_fleet' => 'Флот',
  'ov_destination' => 'Куда',
  'ov_source' => 'Откуда',
  'event_time' => 'Время',
  'ov_mission' => 'Задание',
  'ov_event' => 'Событие',
  'ov_flying_fleets' => 'Флоты, летящие на',
  'ov_other_planets' => 'другие планеты',
  'ov_fleet_arrive' => 'Прибытие',
  'ov_fleet_return' => 'Возвращение',
  'ov_fleet_hold' => 'конец задания',
  'ov_fleet_rocket' => 'Ракетный удар',
  'ov_fleet_exploration' => 'Исследование',
  'ov_fleet_colonization' => 'Колонизация планеты',
  'ov_fleet_no_flying' => 'Нет флотов в полете',
  'ov_vennant' => ' отправленный ',
  'ov_planet_to' => 'с планеты ',
  'ov_moon_to' => 'с луны ',
  'ov_atteint' => ' отправлен на ',
  'ov_planet_to_target' => 'планету ',
  'ov_moon_to_target' => 'луну ',
  'ov_debris_to_target' => 'поле обломков ',
  'ov_explo_to_target' => 'позиции ',
  'ov_explo_stay' => ' на исследование ',
  'ov_explo_mission' => '. Задание : ',
  'ov_rentrant' => ' возвращается ',
  'ov_planet_from' => 'с планеты ',
  'ov_moon_from' => 'с луны ',
  'ov_debris_from' => 'с поля обломков ',
  'ov_explo_from' => 'с позиции ',
  'ov_back_planet' => ' на планету ',
  'ov_back_moon' => ' на луну ',
  'ov_hostile' => ' игрока ',
  'ov_message' => 'Отправить сообщение',

  'imp_user_points_struc' => 'За постройки',
  'imp_user_points_tech' => 'За исследования',
  'imp_user_points_fleet' => 'За флот',
  'imp_user_points_def' => 'За оборону',
  'imp_user_points_res' => 'За ресурсы',
  'imp_user_points_all' => 'Всего',
  'NumberOfRaids' => 'Проведено',
  'RaidsWin' => 'Выиграно',
  'RaidsLoose' => 'Проиграно',
  'Economica' => 'Постройки',
  'Teching' => 'Иследования',
  'imp_statistics' => 'Статистика',

  'Points_1' => 'сектора',
  'km' => 'км',
  'orb' => 'Обломки на орбите',
  'buildings_on_planet' => 'Застройка',
  'ov_planet_details' => 'Подробно о планете',
  'ov_building' => 'Здания',
  'ov_hangar' => 'Верфи',
  'ov_rank' => 'Ранг',
  'ov_rpg_new_level_miner' => 'За достижения в экономике Вы получаете Тёмную Материю.',
  'ov_rpg_new_level_raid' => 'За успешные атаки Вы получаете Тёмную Материю.',
  'ov_points' => 'Очки',
  'ov_raids' => 'Рейды',
  'ov_experience' => 'Опыт',
  'ov_player_rpg' => 'Статистика игрока',
  'ov_banner' => 'Баннер',
  'ov_userbar' => 'Юзербар',
  'ov_banner_empty_id' => 'SuperNova - Join The Game!',
  'ov_new' => 'НОВАЯ',
  'ov_overview' => 'Обзор',
  'ov_manage' => 'Управление',
  'ov_return' => 'Вернуться к обзору',
  'ov_rename' => 'Переименовать',
  'ov_new_name' => 'Новое название',
  'cur_governor' => 'Текущий губернатор',
  'ov_mrc_confirm_1' => 'Вы точно хотите заменить губернатора',
  'ov_mrc_confirm_2' => 'уровня',
  'ov_mrc_confirm_3' => 'на губернатора',
  'ov_mrc_confirm_4' => 'первого уровня? Вся Тёмная Материя, вложенная в текущего губернатора БУДЕТ ПОТЕРЯНА!',
  'ov_manage_page_hint' => '<li class="warning">ВНИМАНИЕ! При найме губернатора, отличного от текущего, предыдущий губернатор увольняется БЕЗ КОМПЕНСАЦИИ ТЁМНОЙ МАТЕРИИ, а уровень нового губернатора будет равен единице!  Поэтому планируйте развитие своей Империи, заранее подбирая губернатора для каждой конкретной планеты в зависимости от её планируемой роли!</li>
  <li>Губернаторы - это наемники, управлюящие отдельной планетой и дающие определенные бонусы для данной планеты</li>
  <li>Кликните на изображении губренатора в списке, чтобы увидеть его описание и предоставляемые им бонусы</li>
  <li>Чтобы нанять конкретного губернатора кликните на надпись "Нанять"</li>
  <li>Повторный найм текущего губрентатора увеличивает его уровень и, соответственно, планетарный эффект</li>
  <li>Некоторые губернаторы имеют ограничения по уровню. Некоторые - нет</li>
  <li>Телепортация перемещает в новые координаты планету вместе с флотами, находящимися на орбите планеты</li>
  <li>Если у планеты есть луна - она также перемещается в новые координаты вместе с флотами</li>
  <li>Телепортация невозможна, если в окрестностях планеты есть какая-то активность флотов (т.е. есть флоты, имеющие в качестве точки отправления или назначения саму планету, луну или поле обломков)</li>
  <li>После телепортации необходимо выждать некоторое время перед следующей телепортацией - нарушенная метрика пространства вокруг планеты должна нормализироваться</li>',

  'ov_gate_time_left' => 'Время до следующего прыжка',

  'ov_teleport' => 'Телепортировать',
  'ov_teleport_new_coordinates' => 'Новые координаты',
  'ov_teleport_err_none' => 'Планета успешно телепортирована',
  'ov_teleport_err_wrong_coordinates' => 'Неправильные координаты',
  'ov_teleport_err_fleet' => 'В окрестностях планеты наблюдается активность флотов',
  'ov_teleport_err_destination_busy' => 'Место назначения занято',
  'ov_teleport_err_cooldown' => 'Невозможно телепортироваться два раза подряд. Подождите пока нормализуется метрика пространства',
  'ov_teleport_err_no_dark_matter' => 'Не хватает Тёмной Материи для телепортации',
  'ov_teleport_log_record' => 'Планета {%2$d} %1$s телепортирована с координат %3$s по координатам %4$s',

  'ov_capital' => 'Сделать столицей Империи',
  'ov_capital_err_none' => 'Планета теперь является столицей Империи',
  'ov_capital_err_capital_already' => 'Эта планета уже является столицей Империи',
  'ov_capital_err_no_dark_matter' => 'Не хватает Тёмной Материи для переноса столицы Империи',
  'ov_capital_err_not_a_planet' => 'Только планету можно сделать столицей Империи',

  'read_all_news' => 'Отметить все как прочитанное',

  'imp_TBA' => 'Что-то будет...',
  'imp_experience_current' => 'Текущий',
  'imp_experience_to_level' => 'Левелап',

  'ov_manage_special' => 'Особые функции',
  'ov_password' => 'Ваш пароль на вход в игру',

  'ov_governor_purchase' => 'Игрок купил Губернатора %1$s ID %2$d уровня %3$d на планету %4$s',


));
