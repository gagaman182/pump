<template>
  <div class="Oil">
    <fish-row>
      <fish-col span="6" class="demo-col">ระดับน้ำมันเครื่อง</fish-col>
      <fish-col span="6" class="demo-col"
        >ดูระดับน้ำมันเครื่อง สีของน้ำมัน</fish-col
      >
      <fish-col span="6" class="demo-col">
        <fish-checkboxes v-model="pumpall[0].oil_1">
          <fish-checkbox index="1" disabled>พร้อมใช้</fish-checkbox>
        </fish-checkboxes>
        <fish-checkboxes v-model="pumpall[0].oil_2">
          <fish-checkbox index="1" disabled>ต่ำกว่าระดับ</fish-checkbox>
        </fish-checkboxes>
        <fish-checkboxes v-model="pumpall[0].oil_3">
          <fish-checkbox index="1" disabled>เติม</fish-checkbox>
        </fish-checkboxes>
        <fish-checkboxes v-model="pumpall[0].oil_4">
          <fish-checkbox index="1" disabled>สีดำ/ค้น</fish-checkbox>
        </fish-checkboxes>
        <fish-checkboxes v-model="pumpall[0].oil_5">
          <fish-checkbox index="1" disabled>เปลี่ยน</fish-checkbox>
        </fish-checkboxes>
      </fish-col>
      <fish-col span="6" class="demo-col">
        <fish-input
          type="textarea"
          hint="หมายเหตุ..."
          style="height:100%; width:100%;"
          v-model="pumpall[0].oil_other"
          disabled
        ></fish-input>
      </fish-col>
    </fish-row>
    <fish-divider fitted></fish-divider>
  </div>
</template>

<script>
export default {
  name: 'Oil',
  props: {
    pumpall: String,
  },
  data() {
    return {};
  },
};
</script>
