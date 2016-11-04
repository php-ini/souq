<?php
/**
 * إعدادات الووردبريس الأساسية
 *
 * عملية إنشاء الملف wp-config.php تستخدم هذا الملف أثناء التنصيب. لا يجب عليك
 * استخدام الموقع، يمكنك نسخ هذا الملف إلى "wp-config.php" وبعدها ملئ القيم المطلوبة.
 *
 * هذا الملف يحتوي على هذه الإعدادات:
 *
 * * إعدادات قاعدة البيانات
 * * مفاتيح الأمان
 * * بادئة جداول قاعدة البيانات
 * * المسار المطلق لمجلد الووردبريس
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** إعدادات قاعدة البيانات - يمكنك الحصول على هذه المعلومات من مستضيفك ** //

/** اسم قاعدة البيانات لووردبريس */
define('DB_NAME', 'blog');

/** اسم مستخدم قاعدة البيانات */
define('DB_USER', 'bloguser');

/** كلمة مرور قاعدة البيانات */
define('DB_PASSWORD', 'blog7530');

/** عنوان خادم قاعدة البيانات */
define('DB_HOST', 'localhost');

/** ترميز قاعدة البيانات */
define('DB_CHARSET', 'utf8mb4');

/** نوع تجميع قاعدة البيانات. لا تغير هذا إن كنت غير متأكد */
define('DB_COLLATE', '');

/**#@+
 * مفاتيح الأمان.
 *
 * استخدم الرابط التالي لتوليد المفاتيح {@link https://api.wordpress.org/secret-key/1.1/salt/}
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'Z;k!]LdcNZ cUb2l{AKzg4ytj|-b~cFB(Kw&8qN[-|=k2&*>_#O#QkU+}k9_]|w_');
define('SECURE_AUTH_KEY',  'U >9~=jOOaZJrI3?iI0j09xZv8;)whwGhYfEzeJ435^w>sO78~[7>|rQiPO$uA%@');
define('LOGGED_IN_KEY',    'U)q`n>@Tx`a*%a! W:%.wAy_1:YL VXfDGYGuV-#U.C&tOq7?n4%)IvWP/O)J&*5');
define('NONCE_KEY',        'IhXP9I2Yx#]9,fTDy?V+Lbfk-h9 @!?1ViuHONf^.n7[^sWWF@%GqMvPip)NPJiR');
define('AUTH_SALT',        '3D7to4m:LFj8BV1 <*N;{;)y XHm&xCFYG(XBPtPI#wh/9LU)i_?6tz0wQNv4h!_');
define('SECURE_AUTH_SALT', 'syJ]6!n1_T5JJ gczym)WE26ly4_/Ul=02mJn.4S[$_/Cmm(hxL.8Xa{w.GD)ff&');
define('LOGGED_IN_SALT',   'Ws^bshMi*ztS*UH/~$s~mLV[E<<?J63Nr(l:/3#snC7Z1w-}{e3!AW+zZM3oJkO/');
define('NONCE_SALT',       '7^5$GO@aJdSxVpaGO~U[Lu^)bZp dK=2pN0h}&OZFOpR>b^_dP}*SmA&uUE=ETE~');

/**#@-*/

/**
 * بادئة الجداول في قاعدة البيانات.
 *
 * تستطيع تركيب أكثر من موقع على نفس قاعدة البيانات إذا أعطيت لكل موقع بادئة جداول مختلفة
 * يرجى استخدام حروف، أرقام وخطوط سفلية فقط!
 */
$table_prefix  = 'blg_';

/**
 * للمطورين: نظام تشخيص الأخطاء
 *
 * قم بتغييرالقيمة، إن أردت تمكين عرض الملاحظات والأخطاء أثناء التطوير.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* هذا هو المطلوب، توقف عن التعديل! نتمنى لك التوفيق. */

/** المسار المطلق لمجلد ووردبريس. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** إعداد متغيرات الووردبريس وتضمين الملفات. */
require_once(ABSPATH . 'wp-settings.php');