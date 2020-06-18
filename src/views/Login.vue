<template>
  <div>
    <fish-row>
      <fish-col span="2" class="demo-col"></fish-col>
      <fish-col span="24" class="demo-col demo-col2">
        <div class="logo ">
          <fish-row>
            <fish-col span="24"> </fish-col>
            <fish-col></fish-col>
          </fish-row></div
      ></fish-col>
      <fish-col span="8" class="demo-col"></fish-col>
    </fish-row>
    <fish-row>
      <fish-col span="24" offset="7" class="demo-col">
        <fish-card style="width: 40%;">
          <center>
            <h1 class="head">
              ระบบตรวจเช็คบำรุงรักษาเครื่องปั้ม / เครื่องจักรบ่อบำบัดน้ำเสีย
            </h1>

            <fish-image
              :url="require('../assets/logo_hos.png')"
              style="height: 100px;"
            ></fish-image>
            <h1 class="rainbow-text">โรงพยาบาลหาดใหญ่</h1>
          </center>
          <fish-divider></fish-divider>

          <fish-form ref="form">
            <fish-field label="Username" name="username">
              <fish-input
                iconLeft="true"
                icon="fa fa-user"
                hint=""
                v-model="form.username"
              ></fish-input>
            </fish-field>

            <fish-field label="Password" name="password">
              <fish-input
                iconLeft="true"
                icon="fa fa-lock"
                type="password"
                v-model="form.password"
                hint=""
              ></fish-input>
            </fish-field>
            <fish-divider></fish-divider>
            <fish-button type="primary" @click="submit">ตกลง</fish-button>
          </fish-form>
        </fish-card>
      </fish-col>
    </fish-row>
  </div>
</template>
<script>
import axios from 'axios';
import {APIPath} from '../../service/APIPath';
const apiPath = new APIPath();
// popup alert
import swal from 'sweetalert';
export default {
  name: 'Login',
  data() {
    return {
      form: {
        username: '',
        password: '',
        token: '',
      },
    };
  },
  methods: {
    submit() {
      axios

        .get(`${apiPath.getBaseUrl()}logincheck.php`, {
          params: {
            username: this.form.username,
            password: this.form.password,
          },
        })
        .then((response) => {
          this.form.tokens = response.data;
          localStorage.setItem('token', JSON.stringify(this.form.tokens));
          localStorage.setItem('saved', new Date().getTime());
          this.form.token = JSON.parse(localStorage.getItem('token'));
          if (this.form.token[0].state == 'no') {
            this.clear();

            swal({
              title: 'แจ้งเตือน!',
              text: 'ไม่สามารถเข้าสู่ระบบได้',
              icon: 'warning',
              button: 'ปิด',
            });
            this.$router.push('/login');
          } else {
            this.$router.push('/');
          }
        });
    },
    clear() {
      this.form.username = '';
      this.form.password = '';
    },
  },
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
  font-family: 'Sriracha';
  text-shadow: 4px 4px 4px #aaa;
  font-size: 20px;
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
  font-size: 40px;
}
.mainmenu-color {
  color: blue;
}
</style>
