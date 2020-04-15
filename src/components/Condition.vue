<template>
  <div class="Condition">
    <fish-row>
      <fish-col span="6" class="demo-col">สภาพโดยรวมของเครื่อง</fish-col>
      <fish-col span="6" class="demo-col"
        >ดูสี จุดแตกร้าว การกัดกรอน น๊อต/สกรู การสั่นสะเทือน</fish-col
      >
      <fish-col span="6" class="demo-col">
        <enhanced-check
          v-model="pumpall[0].condition_1"
          label="พร้อมใช้"
          subClass="primary"
          animate="true"
          disabled="true"
        ></enhanced-check>

        <enhanced-check
          v-model="pumpall[0].condition_2"
          label="เปลี่ยนน๊อต/สกรู"
          subClass="primary"
          animate="true"
          disabled="true"
        ></enhanced-check>

        <enhanced-check
          v-model="pumpall[0].condition_3"
          label="แตกร้าว"
          subClass="primary"
          animate="true"
          disabled="true"
        ></enhanced-check>

        <enhanced-check
          v-model="pumpall[0].condition_4"
          label="มีการกัดกร่อน"
          subClass="primary"
          animate="true"
          disabled="true"
        ></enhanced-check>

        <enhanced-check
          v-model="pumpall[0].condition_5"
          label="ทาสีใหม่"
          subClass="primary"
          animate="true"
          disabled="true"
        ></enhanced-check>

        <enhanced-check
          v-model="pumpall[0].condition_6"
          label="ส่งซ่อมบริษัท"
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
          v-model="pumpall[0].condition_other"
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
  name: "Condition",
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
