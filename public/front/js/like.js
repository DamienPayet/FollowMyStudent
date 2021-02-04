const forms = document.querySelectorAll('#form-js');

forms.forEach(form => {
    form.addEventListener('submit', function (e) {
        e.preventDefault();

        const url = this.getAttribute('action');
        const token = document.querySelector('meta[name="csrf-token"]').content;
        const reponseId = this.querySelector('#reponse-id-js').value;
        const count = this.querySelector('#count-js');

        fetch(url, {
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': token
            },
            method: 'post',
            body: JSON.stringify({
                id: reponseId
            })
        }).then(response => {
          response.json().then(data => {
            console.log(data);
          count.innerHTML = data.count;
            })
        }).catch(error => {
            console.log(error)
        });

    });
});
