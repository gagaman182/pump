<template>
  <div class="Wire">
    <fish-row>
      <fish-col span="6" class="demo-col"> ชุดสายไฟเครื่องปั้ม</fish-col>
      <fish-col span="6" class="demo-col">ดูสภาพของสายจุดจับยึด</fish-col>
      <fish-col span="6" class="demo-col">
        <fish-checkboxes v-model="pumpall[0].wire_1">
          <fish-checkbox index="1" disabled>พร้อมใช้</fish-checkbox>
        </fish-checkboxes>
        <fish-checkboxes v-model="pumpall[0].wire_2">
          <fish-checkbox index="1" disabled>สายขาด</fish-checkbox>
        </fish-checkboxes>
        <fish-checkboxes v-model="pumpall[0].wire_3">
          <fish-checkbox index="1" disabled>สายรั่ว</fish-checkbox>
        </fish-checkboxes>
        <fish-checkboxes v-model="pumpall[0].wire_4">
          <fish-checkbox index="1" disabled>เปลี่ยน</fish-checkbox>
        </fish-checkboxes>
        <fish-checkboxes v-model="pumpall[0].wire_5">
          <fish-checkbox index="1" disabled>แจ้งหัวหน้า</fish-checkbox>
        </fish-checkboxes>
      </fish-col>
      <fish-col span="6" class="demo-col">
        <fish-input
          type="textarea"
          style="height:100%; width:100%;"
          v-model="pumpall[0].wire_other"
          disabled
        ></fish-input>
      </fish-col>
    </fish-row>
  </div>
</template>

<script>
export default {
  name: "Wire",
  props: {
    pumpall: String,
  },
  data() {
    return {};
  },
};
</script>
