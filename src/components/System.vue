<template>
  <div class="System">
    <fish-row>
      <fish-col span="6" class="demo-col"> ตรวจเช็คระบบ ควบคุมปั้ม</fish-col>
      <fish-col span="6" class="demo-col">ตรวจเช็คอุปกรณ์/ทำความสะอาด</fish-col>
      <fish-col span="6" class="demo-col">
        <fish-checkboxes v-model="pumpall[0].system_1">
          <fish-checkbox index="1" disabled>พร้อมใช้</fish-checkbox>
        </fish-checkboxes>
        <fish-checkboxes v-model="pumpall[0].system_2">
          <fish-checkbox index="1" disabled>ตรวจเช็คไฟโชว์</fish-checkbox>
        </fish-checkboxes>
        <fish-checkboxes v-model="pumpall[0].system_3">
          <fish-checkbox index="1" disabled>เปลี่ยนอุปกรณ์</fish-checkbox>
        </fish-checkboxes>
        <fish-checkboxes v-model="pumpall[0].system_4">
          <fish-checkbox index="1" disabled
            >ใช้โบว์เป้าทำความสะอาด</fish-checkbox
          >
        </fish-checkboxes>
        <fish-checkboxes v-model="pumpall[0].system_5">
          <fish-checkbox index="1" disabled
            >ตรวจเช๊ค AUTO MAN ON OFF ตู้ควบคุม</fish-checkbox
          >
        </fish-checkboxes>
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
export default {
  name: "System",
  props: {
    pumpall: String
  },
  data() {
    return {};
  }
};
</script>
