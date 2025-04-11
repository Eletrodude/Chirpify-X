let UserID

let UserSettings = {
    Profile:{
        ProfilePicture:"../Assets/Images/Temp.webp",
        DisplayName:"",
        Username:"",
        Email:"",
        Bio:"",
        Location:"",
    },
    Account:{
        Password:"",
        PhoneNumber:"",
    },
    Display:{
        DarkMode:true,
        FontSize:16,
    },
}


function LoadUserSettings(UserID,Database){
    alert('Alert!!!!')


}

function SetUserSettings(UserID,SettingName,SettingOption,SettingValue){
    if (UserID ==null){
        return
    }elseif (SettingName == null || SettingOption == null|| SettingValue == null){
        return
    }

    



}


