<template>
    <div class="">
      <input name="name" v-model='text' >
      <button @click='items.push(text)' name="button"　class="btn btn-info">{{btnMessage}}</button>
        <ul>
          <li v-for='item in items'>{{item}}</li>
        </ul>
  </div>
</template>

<script>
  export default{
    mounted(){
        console.log('Component mounted.')
    },
    data:function(){
      return{
        btnMessage:'コメント',
        text:'',
        items:[

        ],
      }
    },
  }
</script>

<style>
li{
list-style: none;
}
</style>
