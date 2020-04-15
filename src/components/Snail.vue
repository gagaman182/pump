<template>
  <div class="Snail">
    <fish-row>
      <fish-col span="6" class="demo-col">หอยโข่งปั้ม</fish-col>
      <fish-col span="6" class="demo-col"
        >ดูจุดแตกร้าวซึกหรอ การกัดกรอน</fish-col
      >
      <fish-col span="6" class="demo-col">
        <enhanced-check
          v-model="pumpall[0].snail_1"
          label="พร้อมใช้"
          subClass="primary"
          animate="true"
          disabled="true"
        ></enhanced-check>
        <enhanced-check
          v-model="pumpall[0].snail_2"
          label="มีรอยร้าว"
          subClass="primary"
          animate="true"
          disabled="true"
        ></enhanced-check>
        <enhanced-check
          v-model="pumpall[0].snail_3"
          label="แตกร้าว"
          subClass="primary"
          animate="true"
          disabled="true"
        ></enhanced-check>
        <enhanced-check
          v-model="pumpall[0].snail_4"
          label="มีการกัดกร่อน"
          subClass="primary"
          animate="true"
          disabled="true"
        ></enhanced-check>
        <enhanced-check
          v-model="pumpall[0].snail_5"
          label="สึกหรอ"
          subClass="primary"
          animate="true"
          disabled="true"
        ></enhanced-check>
        <enhanced-check
          v-model="pumpall[0].snail_6"
          label="อุดตัน"
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
          v-model="pumpall[0].snail_other"
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
  name: "Snail",
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
