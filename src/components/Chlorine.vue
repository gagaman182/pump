<template>
  <div class="Chlorine">
    <fish-row>
      <fish-col span="6" class="demo-col">
        ตรวจเช็คถังคลอรีน จุดต่อสาย
      </fish-col>
      <fish-col span="6" class="demo-col"
        >ดูรอยแตก สภาพของถัง จุดต่อของสายคลอรีน</fish-col
      >
      <fish-col span="6" class="demo-col">
        <fish-checkboxes v-model="pumpall[0].chlorine_1">
          <fish-checkbox index="1" disabled>พร้อมใช้</fish-checkbox>
        </fish-checkboxes>
        <fish-checkboxes v-model="pumpall[0].chlorine_2">
          <fish-checkbox index="1" disabled>เปลี่ยนถัง</fish-checkbox>
        </fish-checkboxes>
        <fish-checkboxes v-model="pumpall[0].chlorine_3">
          <fish-checkbox index="1" disabled>แตกร้าว</fish-checkbox>
        </fish-checkboxes>
        <fish-checkboxes v-model="pumpall[0].chlorine_4">
          <fish-checkbox index="1" disabled>เปลี่ยนสายคลอรีน</fish-checkbox>
        </fish-checkboxes>
        <fish-checkboxes v-model="pumpall[0].chlorine_5">
          <fish-checkbox index="1" disabled>มีการกัดกร่อน</fish-checkbox>
        </fish-checkboxes>
      </fish-col>
      <fish-col span="6" class="demo-col">
        <fish-input
          type="textarea"
          hint="หมายเหตุ..."
          style="height:100%; width:100%;"
          v-model="pumpall[0].chlorine_other"
          disabled
        ></fish-input>
      </fish-col>
    </fish-row>
    <fish-divider fitted></fish-divider>
  </div>
</template>

<script>
export default {
  name: 'Chlorine',
  props: {
    pumpall: String,
  },
  data() {
    return {};
  },
};
</script>
