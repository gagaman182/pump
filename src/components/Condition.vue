<template>
  <div class="Condition">
    <fish-row>
      <fish-col span="6" class="demo-col">สภาพโดยรวมของเครื่อง</fish-col>
      <fish-col span="6" class="demo-col"
        >ดูสี จุดแตกร้าว การกัดกรอน น๊อต/สกรู การสั่นสะเทือน</fish-col
      >
      <fish-col span="6" class="demo-col">
        <fish-checkboxes v-model="pumpall[0].condition_1">
          <fish-checkbox index="1" disabled>พร้อมใช้</fish-checkbox>
        </fish-checkboxes>
        <fish-checkboxes v-model="pumpall[0].condition_2">
          <fish-checkbox index="1" disabled>เปลี่ยนน๊อต/สกรู</fish-checkbox>
        </fish-checkboxes>
        <fish-checkboxes v-model="pumpall[0].condition_3">
          <fish-checkbox index="1" disabled>แตกร้าว</fish-checkbox>
        </fish-checkboxes>
        <fish-checkboxes v-model="pumpall[0].condition_4">
          <fish-checkbox index="1" disabled>มีการกัดกร่อน</fish-checkbox>
        </fish-checkboxes>
        <fish-checkboxes v-model="pumpall[0].condition_5">
          <fish-checkbox index="1" disabled>ทาสีใหม่</fish-checkbox>
        </fish-checkboxes>
        <fish-checkboxes v-model="pumpall[0].condition_6">
          <fish-checkbox index="1" disabled>ส่งซ่อมบริษัท</fish-checkbox>
        </fish-checkboxes>
      </fish-col>
      <fish-col span="6" class="demo-col">
        <fish-input
          type="textarea"
          hint="หมายเหตุ..."
          style="height:100%; width:100%;"
          v-model="pumpall[0].condition_other"
          disabled
        ></fish-input>
      </fish-col>
    </fish-row>
    <fish-divider fitted></fish-divider>
  </div>
</template>

<script>
export default {
  name: "Condition",
  props: {
    pumpall: String
  },
  data() {
    return {};
  }
};
</script>
