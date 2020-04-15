<template>
  <div class="Chlorine">
    <fish-row>
      <fish-col span="6" class="demo-col">
        ตรวจเช็คถังคลอรีน จุดต่อสาย
      </fish-col>
      <fish-col span="6" class="demo-col"
        >ดูรอยแตก สภาพของถัง จุดต่อของสายคลอรีน</fish-col
      >
      <fish-col span="6" class="demo-col">
        <enhanced-check
          v-model="pumpall[0].chlorine_1"
          label="พร้อมใช้"
          subClass="primary"
          animate="true"
          disabled="true"
        ></enhanced-check>

        <enhanced-check
          v-model="pumpall[0].chlorine_2"
          label="เปลี่ยนถัง"
          subClass="primary"
          animate="true"
          disabled="true"
        ></enhanced-check>

        <enhanced-check
          v-model="pumpall[0].chlorine_3"
          label="แตกร้าว"
          subClass="primary"
          animate="true"
          disabled="true"
        ></enhanced-check>

        <enhanced-check
          v-model="pumpall[0].chlorine_4"
          label="เปลี่ยนสายคลอรีน"
          subClass="primary"
          animate="true"
          disabled="true"
        ></enhanced-check>

        <enhanced-check
          v-model="pumpall[0].chlorine_5"
          label="มีการกัดกร่อน"
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
          v-model="pumpall[0].chlorine_other"
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
  name: "Chlorine",
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
