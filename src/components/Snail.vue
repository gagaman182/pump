<template>
  <div class="Snail">
    <fish-row>
      <fish-col span="6" class="demo-col">หอยโข่งปั้ม</fish-col>
      <fish-col span="6" class="demo-col"
        >ดูจุดแตกร้าวซึกหรอ การกัดกรอน</fish-col
      >
      <fish-col span="6" class="demo-col">
        <fish-checkboxes v-model="pumpall[0].snail_1">
          <fish-checkbox index="1" disabled>พร้อมใช้</fish-checkbox>
        </fish-checkboxes>
        <fish-checkboxes v-model="pumpall[0].snail_2">
          <fish-checkbox index="1" disabled>มีรอยร้าว</fish-checkbox>
        </fish-checkboxes>
        <fish-checkboxes v-model="pumpall[0].snail_3">
          <fish-checkbox index="1" disabled>แตกร้าว</fish-checkbox>
        </fish-checkboxes>
        <fish-checkboxes v-model="pumpall[0].snail_4">
          <fish-checkbox index="1" disabled>มีการกัดกร่อน</fish-checkbox>
        </fish-checkboxes>
        <fish-checkboxes v-model="pumpall[0].snail_5">
          <fish-checkbox index="1" disabled>สึกหรอ</fish-checkbox>
        </fish-checkboxes>
        <fish-checkboxes v-model="pumpall[0].snail_6">
          <fish-checkbox index="1" disabled>อุดตัน</fish-checkbox>
        </fish-checkboxes>
      </fish-col>
      <fish-col span="6" class="demo-col">
        <fish-input
          type="textarea"
          hint="หมายเหตุ..."
          style="height:100%; width:100%;"
          v-model="pumpall[0].snail_other"
          disabled
        ></fish-input>
      </fish-col>
    </fish-row>
    <fish-divider fitted></fish-divider>
  </div>
</template>

<script>
export default {
  name: 'Snail',
  props: {
    pumpall: String,
  },
  data() {
    return {};
  },
};
</script>
