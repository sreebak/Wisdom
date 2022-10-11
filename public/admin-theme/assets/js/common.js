function showToast(message, type){ 
    $.toast({
        heading: type.charAt(0).toUpperCase() + type.slice(1),
        text: message,
        showHideTransition: 'slide',
        icon: type,
        loaderBg: '#ffffff99',
        position: 'top-right',
        hideAfter: 5000, 
    });
};
