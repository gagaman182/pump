<template>
  <div class="Clean">
    <fish-row>
      <fish-col span="6" class="demo-col">ทำความสะอาด</fish-col>
      <fish-col span="6" class="demo-col">ดูคราบสกปรก</fish-col>
      <fish-col span="6" class="demo-col">
        <fish-checkboxes v-model="pumpall[0].clean_1">
          <fish-checkbox index="1" disabled>ฉีดน้ำใช้แปรงขัด</fish-checkbox>
        </fish-checkboxes>
        <fish-checkboxes v-model="pumpall[0].clean_2">
          <fish-checkbox index="1" disabled>ใช้ปั้มแรงดัน</fish-checkbox>
        </fish-checkboxes>
        <fish-checkboxes v-model="pumpall[0].clean_3">
          <fish-checkbox index="1" disabled>ใช้โบว์เวอร์เปา</fish-checkbox>
        </fish-checkboxes>
        <fish-checkboxes v-model="pumpall[0].clean_4">
          <fish-checkbox index="1" disabled>ใช้ผ้าชุบน้ำเช็ด</fish-checkbox>
        </fish-checkboxes>
      </fish-col>
      <fish-col span="6" class="demo-col">
        <fish-input
          type="textarea"
          hint="หมายเหตุ..."
          style="height:100%; width:100%;"
          v-model="pumpall[0].clean_other"
          disabled
        ></fish-input>
      </fish-col>
    </fish-row>
    <fish-divider fitted></fish-divider>
  </div>
</template>

<script>
export default {
  name: 'Clean',
  props: {
    pumpall: String,
  },
  data() {
    return {};
  },
};
</script>
