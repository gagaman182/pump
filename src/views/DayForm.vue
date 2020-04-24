<template>
  <div>
    <vue-scroll-progress-bar
      @complete="handleComplete"
      height="1rem"
      backgroundColor="navy"
    />
    <fish-card fluid color="teal">
      <div slot="header">
        <h3 class="head">
          <vue-fontawesome icon="copy" size="2"></vue-fontawesome
          >แบบบันทึกการตรวจสอบและบำรุงรักษาประจำวัน
        </h3>
      </div>
      <fish-form ref="form" inline>
        <fish-field
          span="6"
          label="วันที่ตรวจสอบและบำรุงรักษา"
          name="dateservice"
        >
          <!-- format from moment js L = DD/MM/YYYY -->
          <fish-date-picker
            v-model="input.dateservice"
            hint="ระบุวันที่"
            format="L"
          ></fish-date-picker>
        </fish-field>
      </fish-form>
      <fish-divider></fish-divider>

      <fish-row gutter=".5">
        <fish-col span="5"
          ><div class="demo-col demo-col2"><h4>บ่อเติมอากาศ</h4></div></fish-col
        >
        <fish-col span="5"
          ><div class="demo-col demo-col2"><h4>ผลตรวจ</h4></div></fish-col
        >
        <fish-col span="5"
          ><div class="demo-col demo-col2">
            <h4>เครื่องปั้มน้ำและเครื่องดักขยะ</h4>
          </div></fish-col
        >
        <fish-col span="5"
          ><div class="demo-col demo-col2"><h4>ตรวจสอบ</h4></div></fish-col
        >
        <fish-col span="5"
          ><div class="demo-col demo-col2"><h4>การบันทึก</h4></div></fish-col
        >
      </fish-row>
      <fish-row gutter=".5">
        <fish-col span="2" offset="5"
          ><div class="demo-col demo-col2 "><h4>เช้า</h4></div>
        </fish-col>
        <fish-col span="2"
          ><div class="demo-col demo-col2 "><h4>บ่าย</h4></div>
        </fish-col>
        <fish-col span="2" offset="1"
          ><div class="demo-col demo-col2 ">
            <h4>Screen</h4>
          </div></fish-col
        >
        <fish-col span="2"
          ><div class="demo-col demo-col2 ">
            <h4>เครื่องดักขยะบ่อสูบ</h4>
          </div></fish-col
        >
        <fish-col span="2" offset="1"
          ><div class="demo-col demo-col2 "><h4>เช้า</h4></div>
        </fish-col>
        <fish-col span="2"
          ><div class="demo-col demo-col2 "><h4>บ่าย</h4></div>
        </fish-col>
      </fish-row>
      <fish-divider></fish-divider>
      <fish-row gutter=".5">
        <fish-col span="4"
          ><div>สี กลิ่น ฟอง(แดงปนน้ำตาล,ไม่มีกลิ่น/ฟอง)</div>
        </fish-col>
        <fish-col span="1"><div>บ่อเติม</div> </fish-col>
        <fish-col span="2">
          <fish-form ref="form">
            <fish-fields>
              <fish-field name="email">
                <fish-input v-model="pondcolor1" hint="ผล"></fish-input>
              </fish-field>
            </fish-fields>
          </fish-form>
        </fish-col>
        <fish-col span="2">
          <fish-form ref="form">
            <fish-fields>
              <fish-field name="email">
                <fish-input v-model="pondcolor2" hint="ผล"></fish-input>
              </fish-field>
            </fish-fields>
          </fish-form>
        </fish-col>
        <fish-col span="2" offset="1">
          <div class="demo-col demo-col2 ">P-01</div>
        </fish-col>
        <fish-col span="2">
          <div class="demo-col demo-col2 ">ปั้มสูบน้ำเสีย 1</div>
        </fish-col>
        <fish-col span="2" offset="1">
          <enhanced-check
            v-model="pumpfailed1_1"
            label="เช้า"
            subClass="primary"
            animate="true"
          ></enhanced-check>
        </fish-col>
        <fish-col span="2">
          <enhanced-check
            v-model="pumpfailed1_2"
            label="บ่าย"
            subClass="primary"
            animate="true"
          ></enhanced-check>
        </fish-col>
      </fish-row>
    </fish-card></div
></template>
<script>
import {EnhancedCheck} from 'vue-enhanced-check';
export default {
  data() {
    return {
      input: {
        dateservice: '',
        pondcolor1: '',
        pondcolor2: '',
        pumpfailed1_1: '',
        pumpfailed1_2: '',
        pumpfailed2_1: '',
        pumpfailed2_2: '',
      },
    };
  },
  components: {
    EnhancedCheck,
  },
};
</script>

<style scoped>
.demo-col {
  padding: 10px 0;
  text-align: center;
  margin-bottom: 5px;
}
.demo-col2 {
  background: MEDIUMAQUAMARINE;
}
.head {
  font-family: 'Sriracha';
  text-shadow: 4px 4px 4px #aaa;
}
.headsmall {
  font-family: 'Sriracha';
  text-shadow: 2px 2px 2px #aaa;
}
.center {
  text-align: center;
}
</style>
