<?php
/**
 * A call_me for MODx Revolution 2.2.0.
 * usage:
 * <a data-toggle="modal" data-target="#call_me_modal" href="#">Обратный звонок</a>
 * [[!call_me? &tpl_main=`call_me_main` &tpl_success=`call_me_success` &tpl_mail=`call_me_mail`]]
 */
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&  $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest' && $_REQUEST['action'] == 'callme') {
    
    $params['mail_from'] = $modx->getOption('callme.mail_from');
    $params['mail_to'] = $modx->getOption('callme.mail_to');
    $params['mail_from_name'] = $modx->getOption('callme.mail_from_name');
    $params['mail_subject'] = $modx->getOption('callme.mail_subject');
    $params['tpl_mail'] = $modx->getOption('tpl_mail',$scriptProperties,'');
    $params['tpl_success'] = $modx->getOption('tpl_success',$scriptProperties,'');
    
    $params = array_merge($params, $_POST);

    $data = $modx->getChunk($params['tpl_success'],$params);
    $message = $modx->getChunk($params['tpl_mail'], $params);
 
    $modx->getService('mail', 'mail.modPHPMailer');
    $modx->mail->set(modMail::MAIL_BODY,$message);
    $modx->mail->set(modMail::MAIL_FROM,$params['mail_from']);
    $modx->mail->set(modMail::MAIL_FROM_NAME,$params['mail_from_name']);
    $modx->mail->set(modMail::MAIL_SUBJECT,$params['mail_subject']);
    $modx->mail->address('to',$params['mail_to']);
    
    $modx->mail->setHTML(true);
    if (!$modx->mail->send()) {
       $modx->log(modX::LOG_LEVEL_ERROR,'An error occurred while trying to send the email: '.$modx->mail->mailer->ErrorInfo);
       $response = array(
            'success' => false
            ,'message' => 'Ошибка! не удалось послать сообщение'
            ,'data' => $data
        );
    } else {
        $response = array(
            'success' => true
            ,'message' => ''
            ,'data' => $data
        );
    }
    echo json_encode($response);
    exit;
}

$output = '';
$mainArray = array();
$params['tpl_main'] = $modx->getOption('tpl_main',$scriptProperties,'');
$assets_url = MODX_ASSETS_URL;

$script = <<< HTML_END
<script type="text/javascript">
if(!jQuery()) {	document.write('<script src="'+ $assets_url + 'components/call_me/js/lib/jquery/jquery-1.10.2.min.js"><\/script>');	}
if(!jQuery().validate) {	
    document.write('<script src="'+ $assets_url + 'components/call_me/js/lib/validate/jquery.validate.min.js"><\/script>');
    document.write('<script src="'+ $assets_url + 'components/call_me/js/lib/validate/localization/messages_ru"><\/script>');
    document.write('<script src="'+ $assets_url + 'components/call_me/js/lib/validate/bootstrap/bootstrap.validate.js"><\/script>');
    }

$(document).ready(function() {
    $("#call_me").validate({
        submitHandler: function() {
            params = {
                action: "callme"
                ,ctx: "web"
                ,receiver: $("#callme_name").val()
                ,phone: $("#callme_tel").val()
            };
            var action_url = $(this).data("action");
            $.post(action_url, params, function(response) {
        	    response = $.parseJSON(response);
			    if (response.success) {
				    if (response.message) {
					    
				    }
				    $("#call_me").html(response.data);
			    }
		    	else {
				    $("#call_me").html(response.message);
			    }
		    });
		    return false;    
        }   
    });    
});
</script>
HTML_END;
$modx->regClientScript($script);

$output .= $modx->getChunk($params['tpl_main'],$mainArray);
return $output;