<?php
///@Specialist_coder\\\
ob_start();
define('API_KEY','TOKEN'); 
$admin = "id"; // admin IDsi
$bot = "user"; ///bot username
$kanalimiz = "@user";
///@Specialist_coder\\\
function bot($method,$datas=[]){
$url = "https://api.telegram.org/bot".API_KEY."/".$method;
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
$res = curl_exec($ch);
if(curl_error($ch)){
var_dump(curl_error($ch));
}else{
return json_decode($res);
}
}
///@Specialist_coder\\\
$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$chat_id = $message->chat->id;
$cid= $message->chat->id;
$text = $message->text;
$type = $message->chat->type;
$user = $message->from->username;
$name = $message->from->first_name;
$uid = $message->from->id;
$mid = $message->message_id;
$reply = $message->reply_to_message->text;
$data = $update->callback_query->data;
$mmid = $update->callback_query->message->message_id;
$ccid = $update->callback_query->message->chat->id;
$step = file_get_contents("step/$cid.step");
$rek = file_get_contents("tel/$cid.txt");
$stop=file_get_contents("stop.txt");
mkdir("step");
mkdir("tel");
$otmena=json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"❌Bekor Qilish✖"],],
]
]);
$tolov=json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"To`lov qildim💰"],],
]
]);
///@Specialist_coder\\\
$manzil=json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"Andijon"],],
[['text'=>"Toshkent"],],
[['text'=>"Buxoro"],],
[['text'=>"Guliston"],],
[['text'=>"Jizzax"],],
[['text'=>"Zarafshon"],],
[['text'=>"Qarshi"],],
[['text'=>"Navoiy"],],
[['text'=>"Namangan"],],
[['text'=>"Nukus"],],
[['text'=>"Samarqand"],],
[['text'=>"Termiz"],],
[['text'=>"Urganch"],],
[['text'=>"Farg'ona"],],
[['text'=>"Xiva"],],
]
]);

if($text=="/start" and $type=="private"){
bot('sendMessage',[
'chat_id'=>$cid,
'text'=>"Assalomu Aleykum $name
Botimizga Xush Kelibsiz!

Bot Yordamida $kanalimiz Kanalida Sotish uchun E'lon Bera Olasiz!

Boshlash uchun Pastdagi <b>E'lon Berish</b> Tugmasini Bosing!
",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"E'lon Berish"],],
]
]),
]);
}

if($text=="To`lov qildim💰"){
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"<b>📝Tekshirilmoqda...
Agar amalga oshgan bulsa kanalga joylanadi✅</b>",
'parse_mode'=>'html',
]);
bot('sendmessage',[
'chat_id'=>$admin,
'text'=>"<b><a href='tg://user?id=$cid'>$cid</a> to`lov qildi</b>",
'parse_mode'=>'html',
]);
}

if($text=="E'lon Berish" and $type=="private"){
bot('sendMessage',[
'chat_id'=>$cid,
'text'=>"📱Telefoningiz *Model*ini Kiriting!

(Namuna: *GalaxyS10 *)",
'parse_mode'=>'markdown',
'reply_markup'=>$otmena,
]);file_put_contents("step/$cid.step","model");
}
///@Specialist_coder\\\
if($step=="model"){
$rek=file_get_contents("tel/$cid.txt");
file_put_contents("tel/$cid.txt","$rek\n📱#$text");
if($text=="❌Bekor Qilish✖"){
}else{
bot('sendMessage',[
'chat_id'=>$cid,
'text'=>"📱Telefoningiz *Hotira*siniKiriting!

(Namuna: *4/64 GB yoki 8/128 GB*)",
'parse_mode'=>'markdown',
'reply_markup'=>$otmena,
]);file_put_contents("step/$cid.step","hotira");
}
}
///@Specialist_coder\\\
if($step=="hotira"){
$rek=file_get_contents("tel/$cid.txt");
file_put_contents("tel/$cid.txt","$rek\n💾 Hotira: $text");
if($text=="❌Bekor Qilish✖"){
}else{
bot('sendMessage',[
'chat_id'=>$cid,
'text'=>"📱Telefoningiz *Holat*iniYozing!

(Namuna: *A'lo yoki Ekran Singan*)",
'parse_mode'=>'markdown',
'reply_markup'=>$otmena,
]);file_put_contents("step/$cid.step","holat");
}
}
///@Specialist_coder\\\
if($step=="holat"){
$rek=file_get_contents("tel/$cid.txt");
file_put_contents("tel/$cid.txt","$rek\n🛠 Holati: $text");
if($text=="❌Bekor Qilish✖"){
}else{
bot('sendMessage',[
'chat_id'=>$cid,
'text'=>"📱Telefoningiz *⚙Versiya*siniYozing!

(Namuna: *10.0.0 yoki 8.1.0*)",
'parse_mode'=>'markdown',
'reply_markup'=>$otmena
]);file_put_contents("step/$cid.step","versiya");
}
}
///@Specialist_coder\\\
if($step=="versiya"){
$rek=file_get_contents("tel/$cid.txt");
file_put_contents("tel/$cid.txt","$rek\n⚙ Versiya: $text");

if($text=="❌Bekor Qilish✖"){
}else{
bot('sendMessage',[
'chat_id'=>$cid,
'text'=>"📱Telefoningiz *💸Narx*iniYozing!
Dollar yoki So'mda

(Namuna: *150$ yoki 1.500.000 so'm*)",
'parse_mode'=>'markdown',
'reply_markup'=>$otmena
]);file_put_contents("step/$cid.step","narx");
}
}
///@Specialist_coder\\\
if($step=="narx"){
$rek=file_get_contents("tel/$cid.txt");
file_put_contents("tel/$cid.txt","$rek\n💸Narxi: $text");
if($text=="❌Bekor Qilish✖"){
}else{
bot('sendMessage',[
'chat_id'=>$cid,
'text'=>"📱Telefoningiz Xaqida *📋Qo'shimcha Ma'lumot*Bering!
",
'parse_mode'=>'markdown',
'reply_markup'=>$otmena
]);file_put_contents("step/$cid.step","malumot");
}
}
///@Specialist_coder\\\
if($step=="malumot"){
$rek=file_get_contents("tel/$cid.txt");
file_put_contents("tel/$cid.txt","$rek\n📋 $text");

if($text=="❌Bekor Qilish✖"){
}else{
bot('sendMessage',[
'chat_id'=>$cid,
'text'=>"📱Telefoningiz *🌈Rang*iniKiriting!

(Namuna: *Gold, Qora yoki Oq*)",
'parse_mode'=>'markdown',
'reply_markup'=>$otmena
]);file_put_contents("step/$cid.step","rang");
}
}
///@Specialist_coder\\\
if($step=="rang"){
$rek=file_get_contents("tel/$cid.txt");
file_put_contents("tel/$cid.txt","$rek\n🌈 Rangi: $text");

if($text=="❌Bekor Qilish✖"){
}else{
bot('sendMessage',[
'chat_id'=>$cid,
'text'=>"📱Telefoningiz *📦Korobka Dokument📝*Bor yoki Yo'q?

(Namuna: *Komplekt yoki Yo'q*)",
'parse_mode'=>'markdown',
'reply_markup'=>$otmena
]);file_put_contents("step/$cid.step","kordoc");
}
}
///@Specialist_coder\\\
if($step=="kordoc"){
$rek=file_get_contents("tel/$cid.txt");
file_put_contents("tel/$cid.txt","$rek\n📦📝: $text");

if($text=="❌Bekor Qilish✖"){
}else{
bot('sendMessage',[
'chat_id'=>$cid,
'text'=>"📞Aloqa Uchun *Tel Raqamingizni*iniYuboring!

(Namuna: *+9989X xxx xx xx*)",
'parse_mode'=>'markdown',
'reply_markup'=>$otmena
]);file_put_contents("step/$cid.step","nomer");
}
}
///@Specialist_coder\\\
if($step=="nomer"){
$rek=file_get_contents("tel/$cid.txt");
file_put_contents("tel/$cid.txt","$rek\n📞 Aloqa: $text");
if($text=="❌Bekor Qilish✖"){
}else{
bot('sendMessage',[
'chat_id'=>$cid,
'text'=>"📱Telefon Rasmini Yuboring!",
'parse_mode'=>'markdown',
'reply_markup'=>$otmena
]);file_put_contents("step/$cid.step","rasm");
}
}
///@Specialist_coder\\\
$photo_id = $message->photo[1]->file_id;
if(isset($photo_id) and $step == "rasm"){
file_put_contents("step/$cid.photo","$photo_id");
if($text=="❌Bekor Qilish✖"){
}else{
bot('sendMessage',[
'chat_id'=>$cid,
'text'=>"🇺🇿Manzilingizni Tanlang!⬇️",
'parse_mode'=>'markdown',
'reply_markup'=>$manzil,
]);
}
}

///@Specialist_coder\\\


if($text=="Andijon" or $text=="Samarqand" or $text=="Buxoro" or $text=="Farg'ona" or $text=="Namangan" or $text=="Jizzax" or $text=="Nukus" or $text=="Navoiy" or $text=="Guliston" or $text=="Urganch" or $text=="Qarshi" or $text=="Xiva" or $text=="Termiz" or $text=="Zarafshon" or $text=="Toshkent"){ 
$rek=file_get_contents("tel/$cid.txt");
bot('sendMessage',[
'chat_id'=>$cid,
'text'=>"Yaxshi elon qabul qilindi✅

💳Shu karta to`lov qiling: 86000000000 

va pasdagi knopkani bosing👇
",
'parse_mode'=>'html',
'reply_markup'=>$tolov,
]);file_put_contents("stop.txt","$stop\n$cid");
file_put_contents("tel/$cid.txt","$rek \n 🇺🇿 $text");
$reklama=file_get_contents("tel/$cid.txt");
$photos=file_get_contents("step/$cid.photo");
bot('sendMessage',[
'chat_id'=>$admin,
'text'=>"E'lonKeldi!

Reklamani joylash uchun👇
<code>/rek=$cid</code>

<a href='tg://user?id=$cid'>$cid</a> 🆔️ Raqamidan

E'lon Pastda⬇️",
'parse_mode'=>'html',
]);
bot('sendPhoto',[
'chat_id'=>$admin,
'photo'=>$photos, 
'caption'=>"$reklama",
]);
}
///@Specialist_coder\\\
if($text=="❌Bekor Qilish✖"){
unlink("tel/$cid.txt");
bot('sendMessage',[
'chat_id'=>$cid,
'text'=>"❌Bekor Qilindi✅",
]);file_put_contents("step/$cid.step","otmen");
}

///@Specialist_coder\\\
if((mb_stripos($text,"/rek")!==false) and $cid==$admin){
$ex=explode("=",$text);
$reklama=file_get_contents("tel/$ex[1].txt");
$photos=file_get_contents("step/$ex[1].photo");
bot('sendPhoto',[
'chat_id'=>$kanalimiz,
'photo'=>$photos, 
'caption'=>"$reklama

E'lon Bermoqchimisiz?
@$botname ga Kiring!",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"📋E'lon Berish↗️", "url"=>"https://t.me/TelefonBozor_UzBot"]],
]
]), 
]);
bot('sendmessage',[
'chat_id'=>$admin,
'text'=>"📢Kanalga Tashlandi!✅",
]);
 bot('sendPhoto',[
'chat_id'=>$ex[1],
'photo'=>$photos, 
'caption'=>"$reklama",
]);
bot('sendmessage',[
'chat_id'=>$ex[1],
'text'=>"Salom $name 

 Elon kanalga joylandi✅
 
Telefoningiz Sotilsa Adminga Xabar Berib Qo'yish Esdan Chiqmasin😉 ",
'reply_markup'=> json_encode([
'inline_keyboard'=>[
[['text'=>"📋E'lonni Ko'rish", "url"=>"https://t.me/OPTOMTELUZ"]],
]
]),
]);
unlink("tel/$cid.txt");
unlink("step/$cid.photo");
}
$gruppacha=file_get_contents("gruppa.txt");
if($type=="group" or $type=="supergroup"){
if(strpos($gruppacha,"$groupid") !==false){
}else{
file_put_contents("gruppa.txt","$gruppacha\n$groupid");
}
}
$channelcha=file_get_contents("kanal.txt");
if ($type == "channel"){
if(strpos($channelcha,"$channelid") !==false){
}else{
file_put_contents("kanal.txt","$channelcha\n$channelid",FILE_APPEND);
}
}
$kanal=file_get_contents("kanal.txt");
$gruppa=file_get_contents("gruppa.txt");
$lichka=file_get_contents("azolar.txt");
if($type=="private"){
if(strpos($lichka,"$cid") !==false){
}else{
file_put_contents("azolar.txt","$lichka\n$cid");
}
}
if($text=="/stat" and $cid==$admin){
$kanal=file_get_contents("kanal.txt");
$gruppa=file_get_contents("gruppa.txt");
$lichka=file_get_contents("azolar.txt");
$lich=substr_count($lichka,"\n");
$kn=substr_count($kanal,"\n");
$gr=substr_count($gruppa,"\n");
bot('sendMessage',[
'chat_id'=>$admin,
'text'=> "<b>Bot statatistikasi:</b>
├▶👤A'zolar: [ <b>$lich</b> ]
├
├▶📢Kanallar: <b>$kn</b>
├
└▶👥Guruxlar: <b>$gr</b>",
'parse_mode' => 'html',
]);
}
///@Specialist_coder\\\
///@Specialist_coder\\\
///@Specialist_coder\\\
///@Specialist_coder\\\
if(mb_stripos($text , '/xabar') !== false ) {
$ex = explode("=",$text);
$id = $ex[1];
$matn = $ex[2];
bot('sendmessage', [
'chat_id' => $id,
'text' =>"Admindan xabar keldi!
——————————-
*$matn*",
'parse_mode'=>'MarkDown',
]);
}
///@Specialist_coder\\\
?>

