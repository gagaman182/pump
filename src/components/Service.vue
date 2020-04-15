<template>
  <div class="Service">
    <fish-row>
      <fish-col span="6" class="demo-col">ตรวจสอบการ ทำงานของเครื่อง</fish-col>
      <fish-col span="6" class="demo-col"
        >ดูปริมาณน้ำที่ออกจากท่อ เมื่อเครื่องทำงาน</fish-col
      >
      <fish-col span="6" class="demo-col">
        <enhanced-check
          v-model="pumpall[0].service_1"
          label="ปกติ/พร้อมใช้"
          subClass="primary"
          animate="true"
          disabled="true"
        ></enhanced-check>

        <enhanced-check
          v-model="pumpall[0].service_2"
          label="ไม่ออก/มีเสียงดัง"
          subClass="primary"
          animate="true"
          disabled="true"
        ></enhanced-check>

        <enhanced-check
          v-model="pumpall[0].service_3"
          label="ปานกลาง"
          subClass="primary"
          animate="true"
          disabled="true"
        ></enhanced-check>

        <enhanced-check
          v-model="pumpall[0].service_4"
          label="ทำการซ่อม"
          subClass="primary"
          animate="true"
          disabled="true"
        ></enhanced-check>

        <enhanced-check
          v-model="pumpall[0].service_5"
          label="น้อย"
          subClass="primary"
          animate="true"
          disabled="true"
        ></enhanced-check>

        <enhanced-check
          v-model="pumpall[0].service_6"
          label="แจ้งหัวหน้า"
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
          v-model="pumpall[0].service_other"
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
  name: "Service",

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
