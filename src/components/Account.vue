<template>
  <div>
    <fish-row>
      <fish-col span="20" class="demo-col"></fish-col>
      <fish-col span="4" class="demo-col demo-col2">
        <fish-dropdown>
          <a slot="title"
            ><h3>
              <i class="material-icons white-text md-48">face</i>
              <i> {{ this.form.user }}</i>
            </h3></a
          >
          <fish-option index="0" content="Jack"
            ><h4>
              <b>สถานะ:{{ this.form.level }}</b>
            </h4></fish-option
          >
          <fish-option index="1" content="Lucy" @click="signout"
            ><h4>
              ออกจากระบบ
              <i class="material-icons white-text md-48">exit_to_app</i>
            </h4></fish-option
          >
        </fish-dropdown></fish-col
      >
    </fish-row>
  </div>
</template>

<script>
export default {
  name: 'Account',

  data() {
    return {
      form: {
        token: '',
        user: '',
        level: '',
      },
    };
  },
  methods: {
    loginstate() {
      this.form.token = JSON.parse(localStorage.getItem('token'));
      this.form.user = this.form.token[0].fullname;
      this.form.level = this.form.token[0].level;
      // login 2 ชม ถ้าเกินให้ออก แล้ว clear localstorage
      let hours = 2;
      let saved = localStorage.getItem('saved');
      if (saved && new Date().getTime() - saved > hours * 60 * 60 * 1000) {
        localStorage.clear();
        this.$router.push('/login');
      }
    },
    signout: function() {
      localStorage.removeItem('token');
      localStorage.clear();
      this.$router.push('/login');
    },
  },
  mounted() {
    this.loginstate();
  },
};
</script>
