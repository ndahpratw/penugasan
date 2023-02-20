const form = document.getElementById("form");
const firstname = document.getElementById("firstName");
const lastname = document.getElementById("lastName");
const month = document.getElementById("bulan");
const day = document.getElementById("tanggal");
const year = document.getElementById("tahun");
const male = document.getElementById("male");
const female = document.getElementById("female");
const email = document.getElementById("email");
const telepon = document.getElementById("telepon");
const alamat = document.getElementById("alamat");

form.addEventListener("submit",e=>{e.preventDefault();

CheckForm(firstname,lastname,month,day,year,male,female,email,telepon,alamat);})

//FORMAT NOMOR TELEPON
function formatTelepon(){
    const telepon=document.getElementById("telepon");
    const formatInputanValue=ubahFormat(telepon.value);
    telepon.value=formatInputanValue;
}
function ubahFormat(value){
    if(!value) return value;
    const phoneNumber=value.replace(/[^\d]/g,'');
    const phoneNumberLength=phoneNumber.length;
    if(phoneNumberLength<4) return phoneNumber;
    if(phoneNumberLength<7){
        return `(${phoneNumber.slice(0,3)}) ${phoneNumber.slice(3)}`;
    }
    return `(${phoneNumber.slice(0,3)}) ${phoneNumber.slice(
        3,
        6,
        )}-${phoneNumber.slice(6,8)}`;
}

//PENGECEKAN TIAP LABEL DENGAN KONDISI TERTENTU
function CheckForm(firstname,lastname,month,day,year,male,female,email,telepon,alamat){

    //FIRST NAME
    var firstnameValue = firstname.value.trim();
    if(firstnameValue == '') {
        document.getElementById("firstNameError").innerHTML='First Name may not be blank. <label for="firstName"><u>Fix it.</u></label>';
        document.getElementById("firstNameErrorTampil").innerHTML='<em>First Name may not be blank</em>';
        document.getElementById('ket').innerHTML='There was an error in your input.';} 
    else if(!firstnameValue.match(/^[a-zA-Z]*$/)){
        document.getElementById("firstNameError").innerHTML='First Name may not contain numbers. <label for="firstName"><u>Fix it.</u></label>';
        document.getElementById("firstNameErrorTampil").innerHTML='<em>First Name may not contain numbers </em>';
        document.getElementById('ket').innerHTML='There was an error in your input.';}
   else {
        document.getElementById("firstNameError").innerHTML=' ';
        document.getElementById("firstNameErrorTampil").innerHTML=' ';
        document.getElementById('ket').innerHTML=' ';}

    //LAST NAME
    var lastnameValue = lastname.value.trim();
    if(lastnameValue=== '') {
        document.getElementById("lastNameError").innerHTML='Last Name may not be blank. <label for="lastName"><u>Fix it.</u></label>';
        document.getElementById("lastNameErrorTampil").innerHTML='<em>Last Name may not be blank</em>'; 
        document.getElementById('ket').innerHTML='There was an error in your input.';
    }else if(!lastnameValue.match(/^[a-zA-Z]*$/)){
        document.getElementById("lastNameError").innerHTML='Last Name may not contain numbers. <label for="Lastname"><u>Fix it.</u></label>';
        document.getElementById("lastNameErrorTampil").innerHTML='<em>Last Name may not contain numbers</em>';
        document.getElementById('ket').innerHTML='There was an error in your input.';}
    else {
        document.getElementById("lastNameError").innerHTML=' ';
        document.getElementById("lastNameErrorTampil").innerHTML='';
        document.getElementById('ket').innerHTML=' ';}
    
    //DATE OF BIRTH
    var monthValue = month.value;
    var dayValue = day.value;
    var yearValue = year.value;
    if ((monthValue == "") && (dayValue == "") && (yearValue == "")) {
        document.getElementById("dateOfBirthError").innerHTML='Date of Birth may not be blank. <label for="bulan"><u>Fix it.</u></label>';
        document.getElementById("dateOfBirthErrorTampil").innerHTML='<em>Date of Birth may not be blank</em>';
        document.getElementById('ket').innerHTML='There was an error in your input.';}
    else if ((monthValue != "") && (dayValue != "") && (yearValue != "")) {
            document.getElementById("dateOfBirthError").innerHTML=' ';
            document.getElementById("dateOfBirthErrorTampil").innerHTML=' ';
            document.getElementById('ket').innerHTML=' ';}
    
    //GENDER
    var genderValue;
    if (male.checked==false && female.checked==false){
        document.getElementById("genderError").innerHTML='Gender cannot be blank <label for="male"><u> Fix it </u></label>';
        document.getElementById("genderErrorTampil").innerHTML='<em>Gender cannot be blank</em>';
        document.getElementById('ket').innerHTML='There was an error in your input';}
    else if (male.checked==true && female.checked==false){
        genderValue = document.getElementById("male").value;
        document.getElementById("genderError").innerHTML=" ";
        document.getElementById("genderErrorTampil").innerHTML=" ";
        document.getElementById('ket').innerHTML=" ";
    }else if(male.checked==false && female.checked==true){
        genderValue = document.getElementById("female").value;
        document.getElementById("genderError").innerHTML=" ";
        document.getElementById("genderErrorTampil").innerHTML=" ";
        document.getElementById('ket').innerHTML=" ";
    }

    //EMAIL
    var emailValue = email.value;
    if(emailValue=== '') {
        document.getElementById("emailError").innerHTML='The email address may not be blank. <label for="email"><u>Fix it.</u></label>';
        document.getElementById("emailErrorTampil").innerHTML='<em>The email address may not be blank.</em>'; 
        document.getElementById('ket').innerHTML='There was an error in your input.';
    }else if(!emailValue.match(/^([a-z0-9_\.-]+)@([\da-z\.-]+)\./)){
        document.getElementById("emailError").innerHTML='The email address is not valid. <label for="email"><u>Fix it.</u></label>';
        document.getElementById("emailErrorTampil").innerHTML='<em>The email address is not valid.</em>';
        document.getElementById('ket').innerHTML='There was an error in your input.';}
    else {
        document.getElementById("emailError").innerHTML=' ';
        document.getElementById("emailErrorTampil").innerHTML='';
        document.getElementById('ket').innerHTML=' ';}

    //NOMER TELEPON
    var teleponValue = telepon.value;
    if(teleponValue == '') {
        document.getElementById("teleponError").innerHTML='Telpon Number may not be blank. <label for="telepon"><u>Fix it.</u></label>';
        document.getElementById("teleponErrorTampil").innerHTML='<em>Telpon Number may not be blank.</em>'; 
        document.getElementById('ket').innerHTML='There was an error in your input.';}
    else {
        document.getElementById("teleponError").innerHTML='';
        document.getElementById("teleponErrorTampil").innerHTML=''; 
        document.getElementById('ket').innerHTML='';}

    //ALAMAT
    var alamatValue = alamat.value.trim();
    if(alamatValue == '') {
        document.getElementById("alamatError").innerHTML='Address may not be blank. <label for="alamat"><u>Fix it.</u></label>';
        document.getElementById("alamatErrorTampil").innerHTML='<em>Address may not be blank</em>';
        document.getElementById('ket').innerHTML='There was an error in your input.';} 
   else {
        document.getElementById("alamatError").innerHTML=' ';
        document.getElementById("alamatErrorTampil").innerHTML=' ';
        document.getElementById('ket').innerHTML=' ';}

    //memunculkkan hasil formulir yang sudah diisi
    if((firstnameValue != '') && (lastnameValue != '') && (monthValue != "") && (dayValue != "") && (yearValue != "") && (genderValue != undefined) && (emailValue != "") && (teleponValue != "") && (alamatValue != "")){
        
        alert("DATA BERHASIL DISIMPAN")

        document.getElementById("simpan"). innerHTML = firstnameValue + " " + lastnameValue + "'s Profile"   
        document.getElementById("tampilFirstName"). innerHTML = 'First Name : ' + firstnameValue  
        document.getElementById("tampilLastName"). innerHTML = 'Last Name : ' + lastnameValue  
        document.getElementById("tampilDateofBirth"). innerHTML = 'Date of Birth : ' +   monthValue + " " + dayValue + ", " + yearValue 
        document.getElementById("tampilGender"). innerHTML = 'Gender : ' + genderValue  
        document.getElementById("tampilEmail"). innerHTML = 'E-mail : ' + emailValue 
        document.getElementById("tampilTelepon"). innerHTML = 'Telephone : ' + teleponValue  
        document.getElementById("tampilAlamat"). innerHTML = 'Address : ' + alamatValue  

        document.getElementById("form").reset();
   
    } else {
        alert("Semua Kolom Formulir Wajib !")
    }
}