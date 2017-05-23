<?php
/**
* Основные параметры WordPress.
*
* Скрипт для создания wp-config.php использует этот файл в процессе
* установки. Необязательно использовать веб-интерфейс, можно
* скопировать файл в "wp-config.php" и заполнить значения вручную.
*
* Этот файл содержит следующие параметры:
*
* * Настройки MySQL
* * Секретные ключи
* * Префикс таблиц базы данных
* * ABSPATH
*
* @link https://codex.wordpress.org/Editing_wp-config.php
*
* @package WordPress
*/

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define('DB_NAME', 'kresloka_usag');

/** Имя пользователя MySQL */
define('DB_USER', 'kresloka_usag');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', '9lfn2rrb');

/** Имя сервера MySQL */
define('DB_HOST', 'localhost');

/** Кодировка базы данных для создания таблиц. */
define('DB_CHARSET', 'utf8mb4');

/** Схема сопоставления. Не меняйте, если не уверены. */
define('DB_COLLATE', '');

/**#@+
* Уникальные ключи и соли для аутентификации.
*
* Смените значение каждой константы на уникальную фразу.
* Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
* Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
*
* @since 2.6.0
*/
define('AUTH_KEY', 'BUxQ3ZjdR2Lqb9Uvl11I6dJWODii1eDl6M0Jk/K3asqhJVQG9YpaEiNJ8wsp3+dZ');
define('SECURE_AUTH_KEY', '5u1jTYUar16JRexe+dW7EQ50rnYaD9Y3Cwc09q1+b/lCr/pW3aVH+FvKdDQ1TNdm');
define('LOGGED_IN_KEY', 'hP1yAXZkTu9vNoTu2c2CQ4GbLqq8QPLxipub0mBn0iJ57Ej0c7w16eICbVSwNz9y');
define('NONCE_KEY', 'WDYQ/QGAa0wija/f1hluy8Z8yXlr9HVIdy0So+AT6rE5KQr0MgpcpSVlpySn+dnI');
define('AUTH_SALT', 'F/ZgGm6hjy/0AUvJPh9mnPFt0LNaOYKmskQ3c38/qknTmDkgwUO6ajMeGsZqwuy4');
define('SECURE_AUTH_SALT', 'IDWGcj9I7/8PPr1wKKpSLAEZbViPxH5EvhMiUD7CKWLGkCrd75gIA9xNc64qA74w');
define('LOGGED_IN_SALT', 'fP7wDB9er0kBQznsg3ArCYjUUaxZE3W47F54OGpuFxzIa8VO3bmz0NnTNMEYd3L7');
define('NONCE_SALT', 'IGGtQdMdeeH+cCL6oQ31mjduDkjC6fga04Od1ZSQtDp/Tqo6pk1ePKtYdWF+12BU');

/**#@-*/

/**
* Префикс таблиц в базе данных WordPress.
*
* Можно установить несколько сайтов в одну базу данных, если использовать
* разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
*/
$table_prefix = 'wpgc_';

/**
* Для разработчиков: Режим отладки WordPress.
*
* Измените это значение на true, чтобы включить отображение уведомлений при разработке.
* Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
* в своём рабочем окружении.
*
* Информацию о других отладочных константах можно найти в Кодексе.
*
* @link https://codex.wordpress.org/Debugging_in_WordPress
*/
define('WP_DEBUG', false);
define( 'WP_ALLOW_MULTISITE', true );
/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( !defined('ABSPATH') )
define('ABSPATH', dirname(__FILE__) . '/');

/** Инициализирует переменные WordPress и подключает файлы. */
require_once(ABSPATH . 'wp-settings.php');

