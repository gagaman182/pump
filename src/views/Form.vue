<template>
  <div>
    <fish-row>
      <fish-col span="24">
        <h3>ใบตรวจเช็คบำรุงรักษา </h3>
      </fish-col>
    </fish-row>
    <fish-row>
      
        <fish-col span="4">
          เลือกช่วงเดือนที่จะตรวจเช็ค
          <fish-select v-model="month">
            <fish-option index="" content="ระบุเดือน" disabled></fish-option>
            <fish-option index="1" content="1 เดือน"></fish-option>
            <fish-option index="3" content="3 เดือน"></fish-option>
          </fish-select>
          {{month}}
     </fish-col>
    
      <fish-col span="12">
      </fish-col>
    </fish-row>
    <fish-row>
      <fish-col span="6" class="demo-col demo-col2">col-6</fish-col>
      <fish-col span="6" class="demo-col demo-col2">col-6</fish-col>
      <fish-col span="6" class="demo-col demo-col2">col-6</fish-col>
      <fish-col span="6" class="demo-col demo-col2">col-6</fish-col>
    </fish-row>
  </div>
</template>

<script>
  export default {
    name: 'form',
    data() {
      return {
        month: ''
      }
    }
  }
</script>

<style>
  .demo-col {
    background: #e0f0fa;
    padding: 10px 0;
    text-align: center;
    margin-bottom: 5px;
  }
  .demo-col2 {
    background: #7dbcea;
  }
</style>