<template>
  <div class="Seal">
    <fish-row>
      <fish-col span="6" class="demo-col">ซีลเครื่องปั้ม</fish-col>
      <fish-col span="6" class="demo-col"
        >สังเกตุด้วยสายตา ดูว่ามีการรั่วของน้ำ ความซึกหรอ</fish-col
      >
      <fish-col span="6" class="demo-col">
        <enhanced-check
          v-model="pumpall[0].seal_1"
          label="พร้อมใช้"
          subClass="primary"
          animate="true"
          disabled="true"
        ></enhanced-check>

        <enhanced-check
          v-model="pumpall[0].seal_2"
          label="มีรอยรั่วซึม"
          subClass="primary"
          animate="true"
          disabled="true"
        ></enhanced-check>

        <enhanced-check
          v-model="pumpall[0].seal_3"
          label="ชำรุด"
          subClass="primary"
          animate="true"
          disabled="true"
        ></enhanced-check>

        <enhanced-check
          v-model="pumpall[0].seal_4"
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
          v-model="pumpall[0].seal_other"
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
  name: "Seal",
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
