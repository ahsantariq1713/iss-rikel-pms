window.onload = function () {
    window.livewire.on('redirect', payload => {
        let obj = {
            'icon': payload.icon,
            'title': payload.title,
            'text': payload.text,
            'dismiss': payload.dismiss,
        };

        if (payload.options) {
            obj.buttons = payload.options;
            obj.dangerMode = payload.icon === 'error' || payload.icon === 'warning';
        } else {
            obj.button = payload.button  == null ? 'Ok' : payload.button ;
        }

        if (payload.timer != 0) {
            obj.timer = payload.timer;
        }

        if(obj.dismiss != null) {
            document.getElementById(obj.dismiss).click();
        }

        swal(obj).then((yes) => {
            if ((payload.options && yes && payload.redirect != null) || (!payload.options && payload.redirect != null)) {
                window.location.href = payload.redirect
            }
        }).catch((e)=>console.error(e));

    });
};
