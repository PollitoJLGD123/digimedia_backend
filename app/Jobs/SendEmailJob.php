<?php

namespace App\Jobs;

use App\Mail\MailService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Throwable;

class SendEmailJob implements ShouldQueue
{
    use Queueable;

    public $indice;
    public $servicio_id;
    public $mailto;

    public function __construct($indice, $servicio_id, $mailto)
    {

        $this->indice = $indice;
        $this->servicio_id = $servicio_id;
        $this->mailto = $mailto;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $imagenes_main = [
            // Desarrollo y Diseño
            [
                "https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEj72Ga0skRjXoSA4lfHicy1rVJ0kd5DcCKq7Tj8LAhtap-6L4lrRsnoD85TRihXDx1OWE3BdIhRz1j5IJEidAzv1du5Ya5VQBLBAxuGEG9xuK6v4gjpP9jB3dA6otzZXV3j1vxXkdvrpto8i2l3HtzNjmaTWaeX_-Mb0G6jGCifbxBt5Jzyr_fEoZgL7xhQ/s16000/flyer-modal-1-1.jpg",
                "https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEggZAozhvwXsX_KVF_unYAOXhUspbAuw03Gkouv51yzLaGHdmhzW-0nw63eD99WV7nywIIUBcy75xO2XCWG3KxosXfty7Kr0XUOpWeMXzNYaNhasB4j6sQQogbEsxvlfhrOXSgYmjv67ioEGowFeV2tl6-b568yNZVXvSaqHmZDcwpPb5bwm-MJPXoKvid7/s16000/flyer-modal-1-2.jpg",
                "https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEhovmlEgV271V1uhTZBHYgNiPVC1wWYQimBUX4cCEs9ozmaVKOQPFT1ZDP5SUs-cnVgttagVS985vwePSAwRRJyFslHtwkY900Ll4aKpjh1wK40CYayhsBqJy4DI_Y1zI9INeQTXwGlfBDGXAlgvMaY-lMMtu5jcRZM2Q_Dcl-CCP8NtAQWuSRGNX2WRHlj/s16000/flyer-modal-1-3.jpg"
            ],
            // Gestión de Redes Sociales
            [
                "https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEiZTZrnY2A4K0McC6bFqIwChjlYcFsBVjaL-4gVzl87zajaE32egRRBKmIWQ4sfxu3j3MWpvNyXIfbyGpSjw9VS1rFwxMmqREpt0ka-uVimP5wF7o7143ir50K5_AKyJ5ZWvTXKg7_1kh61reKojmQiX6Lr2QkmM6r_1GFPXb2HRGFlYH-SSi5UUEfqOc5S/s16000/flyer-modal-2-1.jpg",
                "https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEh_C0U0tfOZT92qeRr10AXjBfv2vytcekdRjiS_5lVJWii7PQ8Re6Pmi1sGX8K1FPyLO1KHS2txlW_2QP4AoCXWr6HEE6KEPLZriUVAubZnD-g4TS5PHDxXnOuBDyk06r5hEd0_koX0Wgaz5upF_fp1hAeRGwDkHCLP03dAM8Wf-01GhZ8Xp-KYFCrBuImA/s16000/flyer-modal-2-2.jpg",
                "https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEgPmzYChZBt2sCjeZTDtVRvTRmss3MS7nt8vbXMDcBZnUCz-fRfXThAla14Vvgg4My4qKQP8CPyj5hfbEMVXihUr931XQB1EsMvG1x81ifR4RE7hDuaYdfO5EfnsqkCrgglyXj4MlPaxyZpmvr8nZ9ZfYled6CqCzrp_tm2UJFL3p9pBbpzTugpMWEDOiSp/s16000/flyer-modal-2-3.jpg",
            ],
            // Marketing y Gestión Digital
            [
                "https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEg092QZpO6nk2lCpzY4OoufMEqQ4t-4Cd6a2ZzPY1SKNRb40qJeU3dlHEdaFtnZTTZUbX1kbn3TXZ9Z4eVzgJTflVTsQBqZbd2yFnHUTHhtXGzLOm3G7AR5bQVVoGEU8dLJLxSBgLeuFv1YEzy-wtCy2QCUyAoSWRL4Ckc5a9b9XlJ62WmAU_zJG4z4e-Om/s16000/flyer-modal-3-1.jpg",
                "https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEjtreOOM1Y5NhyImyUSZ2VABJ7cJJz6ZIIV5wU87hCWEo35dY06KfKe6ouLUJpEGXscUfVwdTqom57OkynHHJc5EL0BzSmhnanSTTH6hbgrJRXVpqqQQ1t-QDFBN25m_4SzEeHZQUsdA5gaQlrZFic6yvsFu44lrXDr-8yHgG7qG21q0tEAgvg2a7yXrBDI/s16000/flyer-modal-3-2.jpg",
                "https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEgvG2owRjMlCU0lJuon4pDZhNj6-VsJIIDoHCFcTWyQAy7srnlkRxXJjoTB6eCQHXauDqLOeJ2VcJ6F6-5SiuoCBLcZvTpfPu3UQcg53yJmdKGaJqa-zJQTYptfztA1bpJgPzGNi_aP2BA2qpZ809flOkxkmA7rxZlE-jI87UhJtc8c2BQnUj_UeoSikvxj/s16000/flyer-modal-3-3.jpg",
            ],
            // Branding y Diseño
            [
                "https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEiq1Ug8AXStj8VhqjcBk_cptFzr5u1Ue_07ENc-nFqZvyHhuK0VJTxkF5VDs5A7fb5pTUrJFGw5t1WtkHPvXbxxIz5lOM6MUfb6a2XNVlmXpClZ-ujoblAL8tAQgfQyglAisTFmbRB4AVGBP3Mzde0wrNdZD93BjGoBdiP-4ZOlTnHDZ7LVhJqr-ehL73mo/s16000/flyer-modal-4-1.jpg",
                "https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEh8p8zKOLYq9AULleN9EOvk9PybKHES_p7bpEuGrSEh90q7ubLAAVKYPjPtQF2aBMoSQK2V1MiO9tNV32jSViZfdkJDTRE9B1i5uND7NCj79Cnm8rRJ1xl5FSIED85E_D2I5gLUiX0mxosKJJdEUheiacMsjPXKEV8M8A7G8pT8plpPsCrfv4OkygHLLMNw/s16000/flyer-modal-4-2.jpg",
                "https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEgU0x4yrurrYawAgqDVER5cePp69tExxF5JtYRKNWxFXPaAcKdZE-bMoiIZtfMDhM97R9U4MPELvxub8iHeTulwSx2ClJpz4MKd6URFHl_Cz0I4QnfoF-3Is1ZR4nZz9YrTdEyAxO19F4rI6Ft9gtIPhKuBfHqnvwCcffQYCn_zItT_sbfB-y4_t1_ThQyK/s16000/flyer-modal-4-3.jpg",
            ]
        ];

        $title = [
            // Desarrollo y Diseño
            [
                "_*¡IMPULSA TU ÉXITO ONLINE CON DIGIMEDIA!*_ 🌐",
                "*¡FORTALECE TU PRESENCIA EN LÍNEA 💻!*",
                "*¡MAXIMIZA TU PRESENCIA ONLINE!* 💻"
            ],
            // Gestión de Redes Sociales
            [
                "_*¡POTENCIA TU NEGOCIO DIGITAL CON DIGIMEDIA!*_  📈",
                "*¡SUMÉRGETE EN EL MUNDO DIGITAL! 📱!*",
                "*¡AUMENTA TU PRESENCIA EN LAS REDES Y CONQUISTA NUEVAS AUDIENCIAS CON NOSOTROS! 💻🚀* "
            ],
            // Marketing y Gestión Digital
            [
                "_*¡CRECE TU NEGOCIO CON DIGIMEDIA!📈*_",
                "*¡INNOVA EN TUS ESTRATEGIAS DIGITALES!*",
                "*¡Aprovecha los beneficios del mundo digital! 👩🏻💻🖥 * "
            ],
            // Branding y Diseño
            [
                "_*¡DESTACA TU NEGOCIO DIGITAL CON DIGIMEDIA!*_ 🙌🏼",
                "*¡MARCA LA DIFERENCIA! 😉*",
                "**¡TEN UNA IDENTIDAD ÚNICA! 😉*"
            ]
        ];

        $subject = [
            // Desarrollo y Diseño

            [
                "_*¡<a href=\"https://www.digimediamkt.com/\" style=\"color: #a601b8;\">IMPULSA TU ÉXITO</a> ONLINE CON DIGIMEDIA!*_ 🌐",
                "*¡FORTALECE TU <a href=\"https://www.digimediamkt.com/\" style=\"color: #a601b8;\">PRESENCIA EN LÍNEA</a> 💻!*",
                "*¡<a href=\"https://www.digimediamkt.com/\" style=\"color: #a601b8;\">MAXIMIZA</a> TU PRESENCIA ONLINE!* 💻"
            ],
            // Gestión de Redes Sociales
            [
                "_*¡<a href=\"https://www.digimediamkt.com/\" style=\"color: #a601b8;\">POTENCIA TU NEGOCIO</a> DIGITAL CON DIGIMEDIA!*_  📈",
                "*¡SUMÉRGETE EN EL <a href=\"https://www.digimediamkt.com/\" style=\"color: #a601b8;\">MUNDO DIGITAL</a>! 📱!*",
                "*¡<a href=\"https://www.digimediamkt.com/\" style=\"color: #a601b8;\">AUMENTA TU PRESENCIA</a> EN LAS REDES Y CONQUISTA NUEVAS AUDIENCIAS CON NOSOTROS! 💻🚀* "
            ],
            // Marketing y Gestión Digital
            [
                "_*¡CRECE TU NEGOCIO CON <a href=\"https://www.digimediamkt.com/\" style=\"color: #a601b8;\">DIGIMEDIA</a>📈*_",
                "*¡INNOVA EN TUS <a href=\"https://www.digimediamkt.com/\" style=\"color: #a601b8;\">ESTRATEGIAS DIGITALES</a>!*",
                "*¡Aprovecha los beneficios del <a href=\"https://www.digimediamkt.com/\" style=\"color: #a601b8;\">Mundo Digital</a>! 👩🏻💻🖥 * "
            ],
            // Branding y Diseño
            [
                "_*¡DESTACA TU NEGOCIO DIGITAL CON <a href=\"https://www.digimediamkt.com/\" style=\"color: #a601b8;\">DIGIMEDIA</a>!*_ 🙌🏼",
                "*¡MARCA LA DIFERENCIA! 😉*",
                "**¡TEN UNA <a href=\"https://www.digimediamkt.com/\" style=\"color: #a601b8;\">IDENTIDAD ÚNICA</a>! 😉*"
            ]
        ];

        $menssage = [
            // Desarrollo y Diseño
            [
                "<td align=\"left\" style=\"padding:0;Margin:0;padding-top:10px;padding-left:20px;padding-right:20px\"><p style=\"Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;line-height:17px;color:#3F3D3D;font-size:14px;Margin-bottom:15px\">¿Estás cansado de enfrentar problemas con tu sitio web que afectan el crecimiento de tu negocio? En Digimedia, no solo creamos sitios web, ¡forjamos plataformas de impacto!📈.</p><p style=\"Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;line-height:17px;color:#3F3D3D;font-size:14px\">¿Por qué elegir nuestro servicio de desarrollo web? 🚀 </p><ul style=\"Margin:0;padding:0\"><li style=\"-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;line-height:17px;margin-left:0;color:#3F3D3D;font-size:14px;list-style: none\">📌 Diseño impactante con resultados asombrosos </li><li style=\"-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;line-height:17px;Margin-bottom:15px;margin-left:0;color:#3F3D3D;font-size:14px;list-style:none\">📌 Experiencia del usuario que deja huella </li></ul><p style=\"Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;line-height:17px;color:#3F3D3D;font-size:14px\">*Estamos emocionados de ser tu socio en tu próximo éxito online. Si estás listo para un desarrollo web que marque la diferencia, ¡<a href=\"https://www.digimediamkt.com/\" style=\"color: #a601b8;\">Contáctanos</a> ahora!* </p></td>",
                "<td align=\"left\" style=\"padding:0;Margin:0;padding-top:10px;padding-left:20px;padding-right:20px\"><p style=\"Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;line-height:17px;color:#3F3D3D;font-size:14px;Margin-bottom:15px\">¿Quieres hacer <strong><span style=\"color:#3865e3\"><a href=\"https://www.digimediamkt.com/\" style=\"color: #a601b8;\">crecer tus ventas</a></span></strong> en el mundo digital? En Digimedia te garantizamos el mejor servicio de diseño y desarrollo web para que puedas potenciarte en el mundo digital con nuestros beneficios exclusivos 🙌🏼:</p><ul style=\"Margin:0;padding-left:20px\"><li style=\"-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;line-height:17px;margin-left:0;color:#3F3D3D;font-size:14px;list-style: none\">- Aumento de visibilidad y tráfico web. </li><li style=\"-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;line-height:17px;Margin-bottom:15px;margin-left:0;color:#3F3D3D;font-size:14px;list-style:none\">- Sitios web altamente personalizados con herramientas seguras. </li></ul></td>",
                "<td align=\"left\" style=\"padding:0;Margin:0;padding-top:10px;padding-left:20px;padding-right:20px\"><p style=\"Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;line-height:17px;color:#3F3D3D;font-size:14px\"> ¿Deseas una página más <strong> <a href='https://www.digimediamkt.com/' style=\"color:#3865e3;text-decoration:none\"> TRIPLIQUE TUS VENTAS</span></strong>?<br><br> En <strong><span style=\"color:#a601b8\">DIGI</span> <span style=\"color:#3865e3\">MEDIA</span></strong>&nbsp;te ayudaremos<span style=\"color:#a601b8\"> <strong><a href=\"https://www.digimediamkt.com/\" style=\"color: #a601b8;\">impulsar tu éxito</a></strong></span> digital con beneficios exclusivos:</p><ol><li style=\"-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;line-height:17px;Margin-bottom:15px;margin-left:0;color:#3F3D3D;font-size:14px\"><p style=\"Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;line-height:17px;color:#3F3D3D;font-size:14px\"> Aumento de visibilidad y tráfico web garantizado.</p></li><li style=\"-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;line-height:17px;Margin-bottom:15px;margin-left:0;color:#3F3D3D;font-size:14px\"> <p style=\"Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;line-height:17px;color:#3F3D3D;font-size:14px\"> Experiencia del usuario excepcional que convierte<span style=\"color:#3865E3\"> </span>visitantes en clientes leales.</p></li></ol><p style=\"Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;line-height:17px;color:#3F3D3D;font-size:14px\">¡Construye una plataforma de impacto con nosotros y <span style=\"color:#a601b8\"><strong>haz que tu negocio</strong></span> <strong><span style=\"color:#a601b8\">brille en la WEB</span></strong>!</p></td>"
            ],
            // Gestión de Redes Sociales
            [

                "<td align=\"left\" style=\"padding:0;Margin:0;padding-top:10px;padding-left:20px;padding-right:20px\"><p style=\"Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;line-height:17px;color:#3F3D3D;font-size:14px;Margin-bottom:15px\">¿Tus redes sociales no generan interacciones? En DigiMedia, estamos comprometidos en potenciar tu presencia en línea a través de la <em>gestión de redes sociales</em>. Al confiarnos la administración de tus plataformas digitales, experimentarás un aumento significativo en la visibilidad y participación de tu marca. </p><p style=\"Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;line-height:17px;color:#3F3D3D;font-size:14px\">Nuestros <em><a href=\"https://www.digimediamkt.com/\" style=\"color: #a601b8;\">*beneficios exclusivos*</a></em>:</p><ul style=\"Margin:0;padding:0\"><li style=\"-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;line-height:17px;margin-left:0;color:#3F3D3D;font-size:14px;list-style: none\">🚀 Potenciación de tu presencia digital. </li><li style=\"-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;line-height:17px;Margin-bottom:15px;margin-left:0;color:#3F3D3D;font-size:14px;list-style:none\">🚀 Contenido estratégico y de valor. </li></ul><p style=\"Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;line-height:17px;color:#3F3D3D;font-size:14px\"><strong>¡Transformemos juntos tu presencia digital! ¡Háznoslo saber!</strong></p></td>",
                "<td align=\"left\" style=\"padding:0;Margin:0;padding-top:10px;padding-left:20px;padding-right:20px\"><p style=\"Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;line-height:17px;color:#3F3D3D;font-size:14px;Margin-bottom:15px\">¿Quieres tener contenido de calidad? Deja la gestión de tus redes sociales en manos expertas con Digimedia y haz crecer tu negocio de la mejor manera con nuestros <a href=\"https://www.digimediamkt.com/\" style=\"color: #a601b8;\">beneficios exclusivos</a> 📈:</p><ul style=\"Margin:0;padding-left:20px\"><li style=\"-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;line-height:17px;margin-left:0;color:#3F3D3D;font-size:14px;list-style: none\">- Planificación y organización de contenidos. </li><li style=\"-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;line-height:17px;Margin-bottom:15px;margin-left:0;color:#3F3D3D;font-size:14px;list-style:none\">- Análisis de resultados con informes mensuales. </li></ul></td>",
                "<td align=\"left\" style=\"padding:0;Margin:0;padding-top:10px;padding-left:20px;padding-right:20px\"><p style=\"Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;line-height:17px;color:#3F3D3D;font-size:14px;Margin-bottom:15px\">¿Buscas contenido de alto impacto? Confía en los especialistas de <a href=\"https://www.digimediamkt.com/\" style=\"color: #a601b8;\">Digimedia Marketing</a> para gestionar tus redes sociales y lleva tu negocio al siguiente nivel con nuestro servicio de Gestión Redes Sociales. </p><p style=\"Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;line-height:17px;color:#3F3D3D;font-size:14px\"><strong>✅ Diseño estratégico y calendario de contenido en redes.</strong></p><p style=\"Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;line-height:17px;color:#3F3D3D;font-size:14px\"><strong>✅ Análisis de desempeño con reportes mensuales y más!!</strong></p></td>"
            ],
            // Marketing y Gestión Digital
            [
                "<td align=\"left\" style=\"padding:0;Margin:0;padding-top:10px;padding-left:20px;padding-right:20px\"><p style=\"Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;line-height:17px;color:#3F3D3D;font-size:14px;Margin-bottom:15px\">En DigiMedia Marketing, estamos comprometidos en el mejor desarrollo en <em>*marketing digital*</em>. Tendremos el placer de armar estrategias que promuevan tu marca a través de diferentes entornos digitales. </p><p style=\"Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;line-height:17px;color:#3F3D3D;font-size:14px;Margin-bottom:15px\">¿Las estrategias que planteas no logran los objetivos de tu empresa?, entonces adquiere nuestro servicio con <em>*<a href=\"https://www.digimediamkt.com/\" style=\"color: #a601b8;\">beneficios exclusivos</a>*</em>🙌:</p><ul style=\"Margin:0;padding:0\"><li style=\"-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;line-height:17px;margin-left:0;color:#3F3D3D;font-size:14px;list-style: none\">📌 Mejorar tu visibilidad online </li><li style=\"-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;line-height:17px;Margin-bottom:15px;margin-left:0;color:#3F3D3D;font-size:14px;list-style:none\">📌 Vínculo de lealtad con los clientes </li></ul><p style=\"Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;line-height:17px;color:#3F3D3D;font-size:14px\"><strong>¡No te quedes atrás en la era digital y transforma tu marca con soluciones innovadoras! Contáctanos y que comience tu presencia digital.</strong></p></td>",
                "<td align=\"left\" style=\"padding:0;Margin:0;padding-top:10px;padding-left:20px;padding-right:20px\"><p style=\"Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;line-height:17px;color:#3F3D3D;font-size:14px;Margin-bottom:15px\">¿Quieres tener las mejores estrategias online de marketing? En Digimedia somos expertos dominando el mundo digital y juntos potenciaremos tu <a href=\"https://www.digimediamkt.com/\" style=\"color: #a601b8;\">presencia digital.</a> </p><p style=\"Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;line-height:17px;color:#3F3D3D;font-size:14px;Margin-bottom:15px\">Con nosotros podrás:</p><ul style=\"Margin:0;padding-left:20px\"><li style=\"-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;line-height:17px;margin-left:0;color:#3F3D3D;font-size:14px;list-style: none\">- Vínculo de lealtad con los clientes </li><li style=\"-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;line-height:17px;Margin-bottom:15px;margin-left:0;color:#3F3D3D;font-size:14px;list-style:none\">- Desarrollar publicidad en línea </li></ul></td>",
                "<td align=\"left\" style=\"padding:0;Margin:0;padding-top:10px;padding-left:20px;padding-right:20px\"><p style=\"Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;line-height:17px;color:#3F3D3D;font-size:14px;Margin-bottom:15px\">¿Quieres tener las mejores estrategias de <a href=\"https://www.digimediamkt.com/\" style=\"color: #a601b8;\">marketing digital</a>? 💻 Obtén mayores ganancias digitalizando tu negocio junto a Digimedia Marketing 💰📈. Con el servicio de marketing y gestión digital podrás tener:</p><p style=\"Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;line-height:17px;color:#3F3D3D;font-size:14px\"><strong>✅ Estrategias digitales personalizadas.</strong></p><p style=\"Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;line-height:17px;color:#3F3D3D;font-size:14px\"><strong>✅ Mejor rendimiento de tu presupuesto.</strong></p><p style=\"Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;line-height:17px;color:#3F3D3D;font-size:14px;margin-top:15px\">Comunícate con nosotros/responde este mensaje para obtener más información y comienza a ver resultados. </p></td>"
            ],
            // Branding y Diseño
            [

                "<td align=\"left\" style=\"padding:0;Margin:0;padding-top:10px;padding-left:20px;padding-right:20px\"><p style=\"Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;line-height:17px;color:#3F3D3D;font-size:14px;Margin-bottom:15px\">¿Sientes que tu negocio no se diferencia del resto? ¡Haz que tu marca sea inolvidable! </p><p style=\"Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;line-height:17px;color:#3F3D3D;font-size:14px;Margin-bottom:15px\">En DigiMedia, estamos preparados para llevar la identidad de tu marca a otro nivel. Somos especialistas en crear *diseños irresistibles y branding* cautivador.</p><p style=\"Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;line-height:17px;color:#3F3D3D;font-size:14px;Margin-bottom:15px\">Adquiere nuestros <a href=\"https://www.digimediamkt.com/\" style=\"color: #a601b8;\">beneficios exclusivos</a> 🚀:</p><ul style=\"Margin:0;padding:0\"><li style=\"-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;line-height:17px;margin-left:0;color:#3F3D3D;font-size:14px;list-style: none;margin-bottom:15px\">📌 Diferenciación y Reconocimiento </li></ul><p style=\"Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;line-height:17px;color:#3F3D3D;font-size:14px\"><em>Prepárate para darle un giro a tu negocio con todos nuestros beneficios ¡Contacte con nosotros!</em></p></td>",
                "<td align=\"left\" style=\"padding:0;Margin:0;padding-top:10px;padding-left:20px;padding-right:20px\"><p style=\"Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;line-height:17px;color:#3F3D3D;font-size:14px;Margin-bottom:15px\">¿Quieres destacar entre tu competencia? Con Digimedia podrás tener una marca sólida gracias a nuestro <a href=\"https://www.digimediamkt.com/\" style=\"color: #a601b8;\">servicio de Branding y diseño</a> que te ayudarán a ser reconocida entre tus clientes 🚀. </p><ul style=\"Margin:0;padding-left:20px\"><li style=\"-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;line-height:17px;margin-left:0;color:#3F3D3D;font-size:14px;list-style: none\">- Desarrollo en identidad visual de tu marca </li><li style=\"-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;line-height:17px;Margin-bottom:15px;margin-left:0;color:#3F3D3D;font-size:14px;list-style:none\">- Originalidad en conceptos de marca </li></ul></td>",
                "<td align=\"left\" style=\"padding:0;Margin:0;padding-top:10px;padding-left:20px;padding-right:20px\"><p style=\"Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;line-height:17px;color:#3F3D3D;font-size:14px;Margin-bottom:15px\">En Digimedia garantizamos crear experiencias visuales impactantes y memorables para que puedas conectar con tu audiencia, nuestro servicio de Branding y diseño te ayudarán a lograr esto 🚀. </p><p style=\"Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;line-height:17px;color:#3F3D3D;font-size:14px;Margin-bottom:15px\">Nuestros beneficios:</p><ul style=\"Margin:0;padding-left:20px\"><li style=\"-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;line-height:17px;margin-left:0;color:#3F3D3D;font-size:14px;list-style: none\">- Originalidad en conceptos de marca </li><li style=\"-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;line-height:17px;Margin-bottom:15px;margin-left:0;color:#3F3D3D;font-size:14px;list-style:none\">- Construcción de confianza y credibilidad </li></ul><p style=\"Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;line-height:17px;color:#3F3D3D;font-size:14px\">¡Sé parte del mundo digital y potencia tu marca con <a href=\"https://www.digimediamkt.com/\" style=\"color: #a601b8;\">nosotros</a>! 🙌🏼 </p></td>"
            ]
        ];

        try {
            // Validar índices
            if (!isset($this->servicio_id) || $this->servicio_id < 1 || $this->servicio_id > 4) {
                throw new \Exception("servicio_id inválido");
            }

            $serviceIndex = $this->servicio_id - 1;
            $messageIndex = $this->indice;

            // Validar existencia de datos
            if (!isset($menssage[$serviceIndex][$messageIndex]) ||
                !isset($title[$serviceIndex][$messageIndex]) ||
                !isset($imagenes_main[$serviceIndex][$messageIndex]) ||
                !isset($subject[$serviceIndex][$messageIndex])) {
                throw new \Exception("Índices no válidos para los arrays de contenido");
            }

            // Un solo envío de email con datos validados
            Mail::to($this->mailto)->send(new MailService(
                strval($menssage[$serviceIndex][$messageIndex]),
                strval($title[$serviceIndex][$messageIndex]),
                strval($imagenes_main[$serviceIndex][$messageIndex]),
                strval($subject[$serviceIndex][$messageIndex])
            ));

        } catch (\Exception $e) {
            Log::error("Error en SendEmailJob: {$this->servicio_id} - " . $e->getMessage());
        }

    }

    public function failed(Throwable $exception)
    {
        Log::error("Error en SendEmailJob: ". $this->servicio_id );
    }
}
