import { SendMail } from "./components/mailer.js";

(() => {
    const { createApp } = Vue

    createApp({
        data() {
            return {
                message: 'Hello Vue!'
            }
        },

        methods: {
            processMailFailure(result) {
                // show a failure message in the UI
                // use this.$refs to connect to the elements on the page and mark any empty fields/inputs with an error class
                // alert('failure! and if you keep using an alert, DOUBLE failure!');        
                // show some errors in the UI here to let the user know the mail attempt was successful
                 
                result = JSON.parse(result.message).message;

                this.$refs["data-error-box"].innerHTML = "Fill out the fields marked in red";
                this.$refs["data-error-box"].style.display = 'block';
                this.$refs["data-success-box"].style.display = 'none';

                
                    result.forEach(element => {
                        this.$refs[element].classList.add('error');
                    });
                
            },

            processMailSuccess(result) {
                // show a success message in the UI
                // alert("success! but don't EVER use alerts. They are gross.");        
                // show some UI here to let the user know the mail attempt was successful
                this.$refs["data-success-box"].innerHTML = "Mail was successfully sent!";
                this.$refs["data-success-box"].style.display = 'block';
                this.$refs["data-error-box"].style.display = 'none';

                document.querySelectorAll('.error').forEach(field => field.classList.remove('error'));

                document.querySelector('form').reset();
                
            },

            processMail(event) {        
                // use the SendMail component to process mail
                SendMail(this.$el.parentNode)
                    .then(data => this.processMailSuccess(data))
                    .catch(err => this.processMailFailure(err));
            }
        }
    }).mount('#mail-form')
})();