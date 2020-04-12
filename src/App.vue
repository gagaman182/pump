<template>
  <fish-layout class="demo3" sider="l">
    <nav slot="header">
      <div class="logo ">
        <fish-row>
          <fish-col span="2" offset="0.5">
            <fish-image
              :url="require('./assets/logo_hos.png')"
              style="height: 100px;"
            ></fish-image>
          </fish-col>
          <fish-col span="20">
            <h1 class="head">
              ระบบตรวจเช็คบำรุงรักษาเครื่องปั้ม / เครื่องจักรบ่อบำบัดน้ำเสีย
            </h1>
            <h1 class="rainbow-text">โรงพยาบาลหาดใหญ่</h1>
          </fish-col>
        </fish-row>
      </div>
    </nav>

    <div slot="sider">
      <fish-menu mode="inline" style="width: 200px;">
        <fish-option index="0" content="Content">
          <h3><router-link to="/">หน้าหลัก</router-link></h3></fish-option
        >
        <fish-option index="2" content="Tongji">
          <h3>
            <router-link to="/form">ใบตรวจเช็คบำรุงรักษา</router-link>
          </h3></fish-option
        >
      </fish-menu>
    </div>
    <div slot="content"><router-view /></div>
    <div slot="footer">
      copyright@2020 กลุ่มงานเวชกรรมสังคม โรงพยาบาลหาดใหญ่
    </div>
  </fish-layout>
</template>
<script>
export default {
  name: "pump"
};
</script>
<style scoped>
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
  padding: 0.7em 0.8em;
  font-weight: bold;
  font-size: 1.2rem;
}
.head {
  color: navy;
  font-family: "Sriracha";
  text-shadow: 4px 4px 4px #aaa;
  font-size: 40px;
}
.rainbow-text {
  background-image: linear-gradient(
    to left,
    violet,
    indigo,
    blue,
    green,
    yellow,
    orange,
    red
  );
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  font-size: 42px;
}
</style>
