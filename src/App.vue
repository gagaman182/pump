
<template>
  <fish-layout class="demo3" sider="l">
    <nav slot="header">
      <div class="logo head"><h2 >ระบบตรวจเช็คบำรุงรักษาเครื่องปั้ม / เครื่องจักรบ่อบำบัดน้ำเสีย</h2></div>
    </nav>
    <div slot="sider">
      <fish-menu mode="inline" style="width: 200px;">
        <fish-option index="0" content="Home"> <router-link to="/">Home</router-link> </fish-option>
              <fish-option index="0" content="Form"><router-link to="/form">Form</router-link> </fish-option>
       
       
      </fish-menu>
    </div>
    <div slot="content"><router-view/></div>
     <div slot="footer">copyright@2020 กลุ่มงานเวชกรรมสังคม โรงพยาบาลหาดใหญ่</div>
  </fish-layout>
</template>
<script>
  export default {
    name: 'pump'
  }
</script>
<style>
  .fish.layout.demo3 > .header {
    padding: 0;
    background: #e0f0fa;
  }
  .fish.layout.demo3 .has-sider > .content {
    margin: 20px;
    padding: 0.7em 1em;
  }
  .fish.layout.demo3 .logo {
    padding: 1em;
  }
  .logo {
    padding: 0.7em .8em;
    font-weight: bold;
    font-size: 1.2rem;
  }
  .head {
    font-family: 'Sriracha';
     text-shadow: 4px 4px 4px #aaa;
  }
  
</style>


