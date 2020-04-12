<template>
  <div class="Sump">
    <fish-row>
      <fish-col span="6" class="demo-col"> ตรวจสอบบ่อ</fish-col>
      <fish-col span="6" class="demo-col"
        >ความสกปรก ขยะ รอยร้าวของบ่อ สภาพโดยรวม
      </fish-col>
      <fish-col span="6" class="demo-col">
        <fish-checkboxes v-model="pumpall[0].sump_1">
          <fish-checkbox index="1" disabled>มีรอยร้าว</fish-checkbox>
        </fish-checkboxes>
        <fish-checkboxes v-model="pumpall[0].sump_2">
          <fish-checkbox index="1" disabled>แจ้งหัวหน้า</fish-checkbox>
        </fish-checkboxes>
        <fish-checkboxes v-model="pumpall[0].sump_3">
          <fish-checkbox index="1" disabled>ตักเอาขยะออก</fish-checkbox>
        </fish-checkboxes>
        <fish-checkboxes v-model="pumpall[0].sump_4">
          <fish-checkbox index="1" disabled>ดูดเลนด้วยไดโว่</fish-checkbox>
        </fish-checkboxes>
        <fish-checkboxes v-model="pumpall[0].sump_5">
          <fish-checkbox index="1" disabled>ฉีดน้ำใช้แปรงขัด</fish-checkbox>
        </fish-checkboxes>
        <fish-checkboxes v-model="pumpall[0].sump_6">
          <fish-checkbox index="1" disabled>ทำการซ่อมแซม</fish-checkbox>
        </fish-checkboxes>
        <fish-checkboxes v-model="pumpall[0].sump_7">
          <fish-checkbox index="1" disabled>ใช้ปั้มแรงดันฉีด</fish-checkbox>
        </fish-checkboxes>
        <fish-checkboxes v-model="pumpall[0].sump_8">
          <fish-checkbox index="1" disabled>แจ้งบริษัท</fish-checkbox>
        </fish-checkboxes>
      </fish-col>
      <fish-col span="6" class="demo-col">
        <fish-input
          type="textarea"
          hint="หมายเหตุ..."
          style="height:100%; width:100%;"
          v-model="pumpall[0].sump_other"
          disabled
        ></fish-input>
      </fish-col>
    </fish-row>
    <fish-divider fitted></fish-divider>
  </div>
</template>

<script>
export default {
  name: "Sump",
  props: {
    pumpall: String
  },
  data() {
    return {};
  }
};
</script>
