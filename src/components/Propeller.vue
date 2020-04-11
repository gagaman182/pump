<template>
  <div class="Properller">
    <fish-row>
      <fish-col span="6" class="demo-col">ชุดใบพัดปั้ม</fish-col>
      <fish-col span="6" class="demo-col"
        >ดูจุดแตกร้าว ซึกหรอ การหมุน การสั่นสะเทือน เสียงดัง
        การกัดกรอน</fish-col
      >
      <fish-col span="6" class="demo-col">
        <fish-checkboxes v-model="pumpall[0].propeller_1">
          <fish-checkbox index="1" disabled>พร้อมใช้</fish-checkbox>
        </fish-checkboxes>
        <fish-checkboxes v-model="pumpall[0].propeller_2">
          <fish-checkbox index="1" disabled>สันสะเทือน/เสียงดัง</fish-checkbox>
        </fish-checkboxes>
        <fish-checkboxes v-model="pumpall[0].propeller_3">
          <fish-checkbox index="1" disabled>แตกร้าว</fish-checkbox>
        </fish-checkboxes>
        <fish-checkboxes v-model="pumpall[0].propeller_4">
          <fish-checkbox index="1" disabled>มีการกัดกร่อน</fish-checkbox>
        </fish-checkboxes>
        <fish-checkboxes v-model="pumpall[0].propeller_5">
          <fish-checkbox index="1" disabled>สึกหรอ</fish-checkbox>
        </fish-checkboxes>
        <fish-checkboxes v-model="pumpall[0].propeller_6">
          <fish-checkbox index="1" disabled>ส่งซ่อมบริษัท</fish-checkbox>
        </fish-checkboxes>
      </fish-col>
      <fish-col span="6" class="demo-col">
        <fish-input
          type="textarea"
          hint="หมายเหตุ..."
          style="height:100%; width:100%;"
          v-model="pumpall[0].propeller_other"
          disabled
        ></fish-input>
      </fish-col>
    </fish-row>
    <fish-divider fitted></fish-divider>
  </div>
</template>

<script>
export default {
  name: 'Properller',
  props: {
    pumpall: String,
  },
  data() {
    return {};
  },
};
</script>
