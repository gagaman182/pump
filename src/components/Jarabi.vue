<template>
  <div class="Jarabi">
    <fish-row>
      <fish-col span="6" class="demo-col">อัดจาระบี</fish-col>
      <fish-col span="6" class="demo-col">อัดจารบีตามจุดต่างๆ</fish-col>
      <fish-col span="6" class="demo-col">
        <fish-checkboxes v-model="pumpall[0].jarabi_1">
          <fish-checkbox index="1" disabled>พร้อมใช้</fish-checkbox>
        </fish-checkboxes>
        <fish-checkboxes v-model="pumpall[0].jarabi_2">
          <fish-checkbox index="1" disabled>อัดจารบี</fish-checkbox>
        </fish-checkboxes>
      </fish-col>
      <fish-col span="6" class="demo-col">
        <fish-input
          type="textarea"
          hint="หมายเหตุ..."
          style="height:100%; width:100%;"
          v-model="pumpall[0].jarabi_other"
          disabled
        ></fish-input>
      </fish-col>
    </fish-row>
    <fish-divider fitted></fish-divider>
  </div>
</template>

<script>
export default {
  name: "Jarabi",
  props: {
    pumpall: String
  },
  data() {
    return {};
  }
};
</script>
