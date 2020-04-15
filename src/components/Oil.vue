<template>
  <div class="Oil">
    <fish-row>
      <fish-col span="6" class="demo-col">ระดับน้ำมันเครื่อง</fish-col>
      <fish-col span="6" class="demo-col"
        >ดูระดับน้ำมันเครื่อง สีของน้ำมัน</fish-col
      >
      <fish-col span="6" class="demo-col">
        <enhanced-check
          v-model="pumpall[0].oil_1"
          label="พร้อมใช้"
          subClass="primary"
          animate="true"
          disabled="true"
        ></enhanced-check>

        <enhanced-check
          v-model="pumpall[0].oil_2"
          label="ต่ำกว่าระดับ"
          subClass="primary"
          animate="true"
          disabled="true"
        ></enhanced-check>

        <enhanced-check
          v-model="pumpall[0].oil_3"
          label="เติม"
          subClass="primary"
          animate="true"
          disabled="true"
        ></enhanced-check>

        <enhanced-check
          v-model="pumpall[0].oil_4"
          label="สีดำ/ค้น"
          subClass="primary"
          animate="true"
          disabled="true"
        ></enhanced-check>

        <enhanced-check
          v-model="pumpall[0].oil_5"
          label="เปลี่ยน"
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
          v-model="pumpall[0].oil_other"
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
  name: "Oil",
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
