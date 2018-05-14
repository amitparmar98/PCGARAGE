<?php
$data_string = '{"RelatedProspectId":"c8ace4bd-13f5-44e9-b4ea-eeb7557e66b8","ActivityEvent":200,"Fields":[{"SchemaName":"mx_Custom_1","Value":"Mobile"},{"SchemaName":"mx_Custom_2","Value":"Apple"},{"SchemaName":"mx_Custom_3","Value":"IPhone 6S"},{"SchemaName":"mx_Custom_4","Value":"Network Problem"},{"SchemaName":"mx_Custom_5","Value":"Mail In"}]}';
try
{
$curl = curl_init('https://api-in21.leadsquared.com/v2/ProspectActivity.svc/Create?accessKey=u$rb8a2c2f7d22dd7f46011838ee1d2da3f&secretKey=fe8662b18f1c2da5b9797307e0e04bb614519b03');
curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_HEADER, 0);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_HTTPHEADER, array(
        "Content-Type:application/json",
        "Content-Length:".strlen($data_string)
        ));
$json_response = curl_exec($curl);
echo $json_response;
    curl_close($curl);
} catch (Exception $ex) { 
    curl_close($curl);
}?>
<?php


$data_string = '[{"Attribute":"FirstName","Value":"Rama"},{"Attribute":"mx_Street1","Value":"No. 311 Abode Valley, Potheri, Chennai"},{"Attribute":"EmailAddress","Value":"newcustomer12345@pcgaragetest.com"},{"Attribute":"Phone","Value":"9888888888"},{"Attribute":"Notes","Value":"Test note - Need device urgently"},{"Attribute":"mx_Color","Value":"Black"},{"Attribute":"mx_Location","Value":"Bridge House"}]';
try
{
$curl = curl_init('https://api-in21.leadsquared.com/v2/LeadManagement.svc/Lead.Capture?accessKey=u$rb8a2c2f7d22dd7f46011838ee1d2da3f&secretKey=fe8662b18f1c2da5b9797307e0e04bb614519b03');
curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_HEADER, 0);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_HTTPHEADER, array(
        "Content-Type:application/json",
        "Content-Length:".strlen($data_string)
        ));
$json_response = curl_exec($curl);
echo $json_response;
    curl_close($curl);
} catch (Exception $ex) { 
    curl_close($curl);
}?>


<?php 
/*
$data_string = '[{"Attribute":"FirstName","Value":"nitesh test"},{"Attribute":"EmailAddress","Value":"nitesh@gmail.com"},{"Attribute":"Phone","Value":"9658796466"},]';
try
{
// $curl = curl_init('https://api-in21.leadsquared.com/v2/LeadManagement.svc/Lead.Capture?accessKey=u$rb8a2c2f7d22dd7f46011838ee1d2da3f+&secretKey=fe8662b18f1c2da5b9797307e0e04bb614519b03');
$curl = curl_init('https://api-in21.leadsquared.com/v2/LeadManagement.svc/Lead.Capture?accessKey=u$rb8a2c2f7d22dd7f46011838ee1d2da3f&secretKey=fe8662b18f1c2da5b9797307e0e04bb614519b03');
curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_HEADER, 0);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_HTTPHEADER, array(
        "Content-Type:application/json",
        "Content-Length:".strlen($data_string)
        ));
$json_response = curl_exec($curl);
echo $json_response;
    curl_close($curl);
} catch (Exception $ex) { 
    curl_close($curl);
} 
// {"Status":"Success","Message":{"Id":"95044232-7f9d-4bdd-9aac-e1bfdb26af39","RelatedId":"95a2f0f4-599b-4f94-bf31-01ea00614f5d"}}
?>


<?php
$data_string = '{"RelatedProspectId":"95a2f0f4-599b-4f94-bf31-01ea00614f5d","ActivityEvent":201,"Fields":[]}';
try
{
$curl = curl_init('https://api-in21.leadsquared.com/v2/ProspectActivity.svc/Create?accessKey=u$rb8a2c2f7d22dd7f46011838ee1d2da3f&secretKey=fe8662b18f1c2da5b9797307e0e04bb614519b03');
curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_HEADER, 0);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_HTTPHEADER, array(
        "Content-Type:application/json",
        "Content-Length:".strlen($data_string)
        ));
$json_response = curl_exec($curl);
echo $json_response;
    curl_close($curl);
} catch (Exception $ex) { 
    curl_close($curl);
}

?>