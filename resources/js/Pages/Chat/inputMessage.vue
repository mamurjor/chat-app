<template>
<h1> Input Message   </h1>
<input type="text" v-model="message" @keyup.enter="sendMessage()" />

<button @click="sendMessage();">
send
</button>

</template>
<script>
import axios from 'axios';
export default {

props:['room'],
data(){
    return {
        message:'',
        id:2
    }
},
methods:{
    sendMessage(){
        if(this.message==''){
            return;
        }
        axios.Post('/chat/room',this.id+'/messages',{
            message:this.message
        }).then(response =>{
            if(response.status==201){
                this.message='';
                this.$emit('messagesent');
            }
        })
    }
}
}
</script>
