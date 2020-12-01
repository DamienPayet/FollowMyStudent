console.log();
(function ($) {

    var form = $("#signup-form");
    form.validate({
        errorPlacement: function errorPlacement(error, element) {
            element.before(error);
        },
        rules: {
            reponse: {
                required: true,
            },
        },
        messages: {
            reponse: {
                required: "Merci de completer toute les questions"
            },
        },
        onfocusout: function (element) {
            $(element).valid();
        },
        highlight: function (element, errorClass, validClass) {
            $(element).parent().parent().find('.form-group').addClass('form-error');
            $(element).removeClass('valid');
            $(element).addClass('error');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).parent().parent().find('.form-group').removeClass('form-error');
            $(element).removeClass('error');
            $(element).addClass('valid');
        }
    });

    form.steps({
        startIndex: parseInt(document.getElementById("startval").innerText),
        headerTag: "h3",
        bodyTag: "fieldset",
        transitionEffect: "fade",
        labels: {
            next: 'Next',
            finish: 'Finish',
            current: ''
        },
        titleTemplate: '<h3 class="title">#title#</h3>',
        onInit: function (event, currentIndex) {
            // Suppress (skip) "Warning" step if the user is old enough.
            if (currentIndex === 0) {
                form.find('.actions').addClass('test');
            }
        },

        onStepChanging: function (event, currentIndex, newIndex) {
            form.validate().settings.ignore = ":disabled,:hidden";
            return form.valid();
        },
        onFinishing: function (event, currentIndex) {
            console.log("end");
            form.validate().settings.ignore = ":disabled";
            return form.valid();
        },
        onFinished: function (event, currentIndex) {

            console.log("sub");
            alert('Sumited');
        },
        onStepChanged: function (event, currentIndex, priorIndex) {
            var listInput = document.querySelectorAll("input.part_" + currentIndex);
            var listRep = [];
            var listQuest = [];
            for (var i = 0; i < listInput.length; i++) {
                listRep[i] = listInput[i].value;
                listQuest[i] = listInput[i].id;
            }
            var length = listQuest.length;
            todb(listRep, listQuest,length);
            console.log(listRep);
            console.log(listQuest);
        }
    });


})(jQuery);

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('.your_picture_image')
                .attr('src', e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
    }
}

function todb(responses, questions,leingth) {
console.log("jsuis la");
    $.ajax({
        type: 'get',
        url: "response_store",
        data: {
            _token: '{{csrf_token()}}',
            rep: responses,
            question: questions,
            len: leingth
        },
        dataType: 'JSON',
        success: function (response) {
            //console.log(response);
        },
        error: function () {
            console.log('Erreur');
        }
    });
}
