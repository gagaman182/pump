<template>
  <div class="Arm">
    <fish-row>
      <fish-col span="6" class="demo-col">ชุดแขนของเครื่อง กวาดตะกอน</fish-col>
      <fish-col span="6" class="demo-col"
        >ดูการหมุนของแขนกวาดตะกอน น๊อต/สกรู การสั่นสะเทือน เสียงดัง
        การกัดกร่อน</fish-col
      >
      <fish-col span="6" class="demo-col">
        <fish-checkboxes v-model="pumpall[0].arm_1">
          <fish-checkbox index="1" disabled>พร้อมใช้</fish-checkbox>
        </fish-checkboxes>
        <fish-checkboxes v-model="pumpall[0].arm_2">
          <fish-checkbox index="1" disabled>เปลี่ยนน๊อต/สกรู</fish-checkbox>
        </fish-checkboxes>
        <fish-checkboxes v-model="pumpall[0].arm_3">
          <fish-checkbox index="1" disabled>ชำรุด</fish-checkbox>
        </fish-checkboxes>
        <fish-checkboxes v-model="pumpall[0].arm_4">
          <fish-checkbox index="1" disabled>สึกหรอ/เป็นสนิม</fish-checkbox>
        </fish-checkboxes>
        <fish-checkboxes v-model="pumpall[0].arm_5">
          <fish-checkbox index="1" disabled>ทาสีใหม่</fish-checkbox>
        </fish-checkboxes>
      </fish-col>
      <fish-col span="6" class="demo-col">
        <fish-input
          type="textarea"
          hint="หมายเหตุ..."
          style="height:100%; width:100%;"
          v-model="pumpall[0].arm_other"
          disabled
        ></fish-input>
      </fish-col>
    </fish-row>
    <fish-divider fitted></fish-divider>
  </div>
</template>

<script>
export default {
  name: 'Arm',
  props: {
    pumpall: String,
  },
  data() {
    return {};
  },
};
</script>
