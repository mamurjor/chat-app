

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Container
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <messageContainer />

                      <inputMessage :room="currentRoom" />
                </div>
            </div>
        </div>
    </AppLayout>
</template>
<script >
import AppLayout from '@/Layouts/AppLayout.vue';

import messageContainer from './messageContainer.vue'
import inputMessage from './inputMessage.vue'
import axios from 'axios';

export default{
    components:{
        AppLayout,
        messageContainer,
        inputMessage

    },
    data: function(){
            return{
            chatRooms:[],
            currentRoom:[],
            message:[]
            }


    },
    methods:{
        getRoom(){
            axios.get('/chat/rooms')
            .then(response=>{
                console.log(response.data[0]);
                this.chatRooms=response.data;
                this.setRoom(response.data[0]);
            })
            .catch(error=>{
                console.log(error);
            })
        },
        setRoom(room){
            this.currentRoom=room;
            this.getMessage();
        },
        getMessage(){
            axios.get('chat/room'+this.currentRoom.id+'/message')
            .then(response=>{
                this.message=response.data;
            })
             .catch(error=>{
                console.log(error);
            })
        },
        create(){
            this.getRoom();
        }
    }
}


</script>
