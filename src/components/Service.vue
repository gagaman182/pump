<template>
  <div class="Service">
    <fish-row>
      <fish-col span="6" class="demo-col">ตรวจสอบการ ทำงานของเครื่อง</fish-col>
      <fish-col span="6" class="demo-col"
        >ดูปริมาณน้ำที่ออกจากท่อ เมื่อเครื่องทำงาน</fish-col
      >
      <fish-col span="6" class="demo-col">
        <fish-checkboxes v-model="pumpall[0].service_1">
          <fish-checkbox index="1" disabled>ปกติ/พร้อมใช้</fish-checkbox>
        </fish-checkboxes>
        <fish-checkboxes v-model="pumpall[0].service_2">
          <fish-checkbox index="1" disabled>ไม่ออก/มีเสียงดัง</fish-checkbox>
        </fish-checkboxes>
        <fish-checkboxes v-model="pumpall[0].service_3">
          <fish-checkbox index="1" disabled>ปานกลาง</fish-checkbox>
        </fish-checkboxes>
        <fish-checkboxes v-model="pumpall[0].service_4">
          <fish-checkbox index="1" disabled>ทำการซ่อม</fish-checkbox>
        </fish-checkboxes>
        <fish-checkboxes v-model="pumpall[0].service_5">
          <fish-checkbox index="1" disabled>น้อย</fish-checkbox>
        </fish-checkboxes>
        <fish-checkboxes v-model="pumpall[0].service_6">
          <fish-checkbox index="1" disabled>แจ้งหัวหน้า</fish-checkbox>
        </fish-checkboxes>
      </fish-col>
      <fish-col span="6" class="demo-col">
        <fish-input
          type="textarea"
          hint="หมายเหตุ..."
          style="height:100%; width:100%;"
          v-model="pumpall[0].service_other"
          disabled
        ></fish-input>
      </fish-col>
    </fish-row>
    <fish-divider fitted></fish-divider>
  </div>
</template>

<script>
export default {
  name: 'Service',
  props: {
    pumpall: String,
  },
  data() {
    return {};
  },
};
</script>
