<template>
  <div class="Sump">
    <fish-row>
      <fish-col span="6" class="demo-col"> ตรวจสอบบ่อ</fish-col>
      <fish-col span="6" class="demo-col"
        >ความสกปรก ขยะ รอยร้าวของบ่อ สภาพโดยรวม
      </fish-col>
      <fish-col span="6" class="demo-col">
        <enhanced-check
          v-model="pumpall[0].sump_1"
          label="มีรอยร้าว"
          subClass="primary"
          animate="true"
          disabled="true"
        ></enhanced-check>
        <enhanced-check
          v-model="pumpall[0].sump_2"
          label="แจ้งหัวหน้า"
          subClass="primary"
          animate="true"
          disabled="true"
        ></enhanced-check>
        <enhanced-check
          v-model="pumpall[0].sump_3"
          label="ตักเอาขยะออก"
          subClass="primary"
          animate="true"
          disabled="true"
        ></enhanced-check>
        <enhanced-check
          v-model="pumpall[0].sump_4"
          label="ดูดเลนด้วยไดโว่"
          subClass="primary"
          animate="true"
          disabled="true"
        ></enhanced-check>
        <enhanced-check
          v-model="pumpall[0].sump_5"
          label="ฉีดน้ำใช้แปรงขัด"
          subClass="primary"
          animate="true"
          disabled="true"
        ></enhanced-check>
        <enhanced-check
          v-model="pumpall[0].sump_6"
          label="ทำการซ่อมแซม"
          subClass="primary"
          animate="true"
          disabled="true"
        ></enhanced-check>
        <enhanced-check
          v-model="pumpall[0].sump_7"
          label="ใช้ปั้มแรงดันฉีด"
          subClass="primary"
          animate="true"
          disabled="true"
        ></enhanced-check>
        <enhanced-check
          v-model="pumpall[0].sump_8"
          label="แจ้งบริษัท"
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
          v-model="pumpall[0].sump_other"
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
  name: "Sump",
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
