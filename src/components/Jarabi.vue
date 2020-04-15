<template>
  <div class="Jarabi">
    <fish-row>
      <fish-col span="6" class="demo-col">อัดจาระบี</fish-col>
      <fish-col span="6" class="demo-col">อัดจารบีตามจุดต่างๆ</fish-col>
      <fish-col span="6" class="demo-col">
        <enhanced-check
          v-model="pumpall[0].jarabi_1"
          label="พร้อมใช้"
          subClass="primary"
          animate="true"
          disabled="true"
        ></enhanced-check>

        <enhanced-check
          v-model="pumpall[0].jarabi_2"
          label="อัดจารบี"
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
          v-model="pumpall[0].jarabi_other"
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
  name: "Jarabi",
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
