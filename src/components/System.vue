<template>
  <div class="System">
    <fish-row>
      <fish-col span="6" class="demo-col"> ตรวจเช็คระบบ ควบคุมปั้ม</fish-col>
      <fish-col span="6" class="demo-col">ตรวจเช็คอุปกรณ์/ทำความสะอาด</fish-col>
      <fish-col span="6" class="demo-col">
        <enhanced-check
          v-model="pumpall[0].system_1"
          label="พร้อมใช้"
          subClass="primary"
          animate="true"
          disabled="true"
        ></enhanced-check>
        <enhanced-check
          v-model="pumpall[0].system_2"
          label="ตรวจเช็คไฟโชว์"
          subClass="primary"
          animate="true"
          disabled="true"
        ></enhanced-check>
        <enhanced-check
          v-model="pumpall[0].system_3"
          label="เปลี่ยนอุปกรณ์"
          subClass="primary"
          animate="true"
          disabled="true"
        ></enhanced-check>
        <enhanced-check
          v-model="pumpall[0].system_4"
          label="ใช้โบว์เป้าทำความสะอาด"
          subClass="primary"
          animate="true"
          disabled="true"
        ></enhanced-check>
        <enhanced-check
          v-model="pumpall[0].system_5"
          label="ตรวจเช๊ค AUTO MAN ON OFF ตู้ควบคุม"
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
          v-model="pumpall[0].system_other"
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
  name: "System",
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
