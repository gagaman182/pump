<template>
  <div class="Wire">
    <fish-row>
      <fish-col span="6" class="demo-col"> ชุดสายไฟเครื่องปั้ม</fish-col>
      <fish-col span="6" class="demo-col">ดูสภาพของสายจุดจับยึด</fish-col>
      <fish-col span="6" class="demo-col">
        <enhanced-check
          v-model="pumpall[0].wire_1"
          label="พร้อมใช้"
          subClass="primary"
          animate="true"
          disabled="true"
        ></enhanced-check>
        <enhanced-check
          v-model="pumpall[0].wire_2"
          label="สายขาด"
          subClass="primary"
          animate="true"
          disabled="true"
        ></enhanced-check>
        <enhanced-check
          v-model="pumpall[0].wire_3"
          label="สายรั่ว"
          subClass="primary"
          animate="true"
          disabled="true"
        ></enhanced-check>
        <enhanced-check
          v-model="pumpall[0].wire_4"
          label="เปลี่ยน"
          subClass="primary"
          animate="true"
          disabled="true"
        ></enhanced-check>
        <enhanced-check
          v-model="pumpall[0].wire_5"
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
          v-model="pumpall[0].wire_other"
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
  name: "Wire",
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
