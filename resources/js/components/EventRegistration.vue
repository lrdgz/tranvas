<template>
    <div class="EventRegistration__wrapper">
        <button class="btn"
                v-bind:class="buttonMode"
                v-on:click="handleRegistration"
        >{{ buttonText }}</button>
    </div>
</template>

<script>
    import { registrationUrl } from './../config';
    export default {
        props: ['text', 'mode', 'eventId'],

        created(){
            this.buttonText = this.text;
            this.buttonMode = this.mode;
        },

        data() {
            return {
                buttonText: '',
                buttonMode: '',
            };
        },

        methods: {
            handleRegistration(){
                let postData = {
                    eventID: this.eventId
                };

                axios.post(registrationUrl, postData)
                     .then( response =>{
                         console.log(response);
                         if(response.status == 200){
                             this.buttonMode = 'btn-success';
                             this.buttonText = 'Register';
                         }

                         if(response.status == 201){
                             this.buttonMode = 'btn-warning';
                             this.buttonText = 'De-Register';
                         }
                     })
            }
        }
    };
</script>
