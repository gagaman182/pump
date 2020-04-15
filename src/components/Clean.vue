<template>
  <div class="Clean">
    <fish-row>
      <fish-col span="6" class="demo-col">ทำความสะอาด</fish-col>
      <fish-col span="6" class="demo-col">ดูคราบสกปรก</fish-col>
      <fish-col span="6" class="demo-col">
        <enhanced-check
          v-model="pumpall[0].clean_1"
          label="ฉีดน้ำใช้แปรงขัด"
          subClass="primary"
          animate="true"
          disabled="true"
        ></enhanced-check>

        <enhanced-check
          v-model="pumpall[0].clean_2"
          label="ใช้ปั้มแรงดัน"
          subClass="primary"
          animate="true"
          disabled="true"
        ></enhanced-check>

        <enhanced-check
          v-model="pumpall[0].clean_3"
          label="ใช้โบว์เวอร์เปา"
          subClass="primary"
          animate="true"
          disabled="true"
        ></enhanced-check>

        <enhanced-check
          v-model="pumpall[0].clean_4"
          label="ใช้ผ้าชุบน้ำเช็ด"
          subClass="primary"
          animate="true"
          disabled="true"
        ></enhanced-check>
      </fish-col>
      <fish-col span="6" class="demo-col">
        <fish-input
          type="textarea"
          hint="หมายเหตุ..."
          style="height:100%; width:100%;"
          v-model="pumpall[0].clean_other"
          disabled
        ></fish-input>
      </fish-col>
    </fish-row>
    <fish-divider fitted></fish-divider>
  </div>
</template>

<script>
import { EnhancedCheck } from "vue-enhanced-check";
export default {
  name: "Clean",
  components: {
    EnhancedCheck
  },
  props: {
    pumpall: String
  },
  data() {
    return {};
  }
};
</script>
