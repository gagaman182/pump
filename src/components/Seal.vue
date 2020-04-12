<template>
  <div class="Seal">
    <fish-row>
      <fish-col span="6" class="demo-col">ซีลเครื่องปั้ม</fish-col>
      <fish-col span="6" class="demo-col"
        >สังเกตุด้วยสายตา ดูว่ามีการรั่วของน้ำ ความซึกหรอ</fish-col
      >
      <fish-col span="6" class="demo-col">
        <fish-checkboxes v-model="pumpall[0].seal_1">
          <fish-checkbox index="1" disabled>พร้อมใช้</fish-checkbox>
        </fish-checkboxes>
        <fish-checkboxes v-model="pumpall[0].seal_2">
          <fish-checkbox index="1" disabled>มีรอยรั่วซึม</fish-checkbox>
        </fish-checkboxes>
        <fish-checkboxes v-model="pumpall[0].seal_3">
          <fish-checkbox index="1" disabled>ชำรุด</fish-checkbox>
        </fish-checkboxes>
        <fish-checkboxes v-model="pumpall[0].seal_4">
          <fish-checkbox index="1" disabled>ส่งซ่อมบริษัท</fish-checkbox>
        </fish-checkboxes>
      </fish-col>
      <fish-col span="6" class="demo-col">
        <fish-input
          type="textarea"
          hint="หมายเหตุ..."
          style="height:100%; width:100%;"
          v-model="pumpall[0].seal_other"
          disabled
        ></fish-input>
      </fish-col>
    </fish-row>
    <fish-divider fitted></fish-divider>
  </div>
</template>

<script>
export default {
  name: "Seal",
  props: {
    pumpall: String
  },
  data() {
    return {};
  }
};
</script>
