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
          ><div class="demo-col demo-col3"><h4>บ่อเติมอากาศ</h4></div></fish-col
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
        <fish-col span="4"
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
        <fish-col span="2" offset="1"></fish-col>
        <fish-col span="2"></fish-col>
        <fish-col span="1" offset="1"
          ><div class="demo-col demo-col2 "><h4>เช้า</h4></div>
        </fish-col>
        <fish-col span="1"
          ><div class="demo-col demo-col2 "><h4>บ่าย</h4></div>
        </fish-col>
        <fish-col span="2"
          ><div class="demo-col demo-col2 "><h4>ไม่ได้ใช้งาน</h4></div>
        </fish-col>
        <fish-col span="4" offset="1"> </fish-col>
      </fish-row>

      <fish-row gutter=".5">
        <fish-col span="4"
          ><div class="demo-col demo-col2 ">
            <h4>สี กลิ่น ฟอง</h4>
          </div>
        </fish-col>
        <fish-col span="1"
          ><div class="demo-col demo-col4 "><h4>-</h4></div>
        </fish-col>
        <fish-col span="2">
          <div class="demo-col demo-col4 "><h4>-</h4></div>
        </fish-col>
        <fish-col span="2">
          <div class="demo-col demo-col4 "><h4>-</h4></div>
        </fish-col>
        <fish-col span="2" offset="1">
          <div class="demo-col demo-col2 "><h4>Screen</h4></div>
        </fish-col>
        <fish-col span="2">
          <div class="demo-col demo-col2 "><h4>เครื่องดักขยะบ่อสูบ</h4></div>
        </fish-col>
        <fish-col span="1" offset="1">
          <enhanced-check
            v-model="trap1"
            label="เช้า"
            subClass="primary"
            animate="true"
          ></enhanced-check>
        </fish-col>
        <fish-col span="1">
          <enhanced-check
            v-model="trap2"
            label="บ่าย"
            subClass="primary"
            animate="true"
          ></enhanced-check>
        </fish-col>
        <fish-col span="2">
          <enhanced-check
            v-model="trap3"
            label="ไม่ได้ใช้งาน"
            subClass="danger"
            animate="true"
          ></enhanced-check>
        </fish-col>

        <fish-col span="4" offset="1"
          ><div><h4>1. เมื่อตรวจสอบแล้วอุปกรณ์นั้น</h4></div>
        </fish-col>
      </fish-row>
      <fish-row gutter=".5">
        <fish-col span="4"
          ><div class="demo-col demo-col2 ">
            <h5>(แดงปนน้ำตาล,ไม่มีกลิ่น/ฟอง)</h5>
          </div>
        </fish-col>
        <fish-col span="1"
          ><div class="demo-col demo-col2 "><h4>บ่อเติม</h4></div>
        </fish-col>
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
          <div class="demo-col demo-col2 "><h4>P-01</h4></div>
        </fish-col>
        <fish-col span="2">
          <div class="demo-col demo-col2 "><h4>ปั้มสูบน้ำเสีย 1</h4></div>
        </fish-col>
        <fish-col span="1" offset="1">
          <enhanced-check
            v-model="pumpfailed1_1"
            label="เช้า"
            subClass="primary"
            animate="true"
          ></enhanced-check>
        </fish-col>
        <fish-col span="1">
          <enhanced-check
            v-model="pumpfailed1_2"
            label="บ่าย"
            subClass="primary"
            animate="true"
          ></enhanced-check>
        </fish-col>
        <fish-col span="2">
          <enhanced-check
            v-model="pumpfailed1_3"
            label="ไม่ได้ใช้งาน"
            subClass="danger"
            animate="true"
          ></enhanced-check>
        </fish-col>
        <fish-col span="4" offset="1">
          <div>
            <h4>
              ก. ทำงานปกติ
            </h4>
          </div>
        </fish-col>
      </fish-row>
      <fish-divider></fish-divider>
      <fish-row gutter=".5">
        <fish-col span="5">
          <div class="demo-col demo-col3 "><h4>บ่อตกตะก่อน</h4></div>
        </fish-col>
        <fish-col span="5"
          ><div class="demo-col demo-col2"><h4>ผลตรวจ</h4></div></fish-col
        >
        <fish-col span="2">
          <div class="demo-col demo-col2 "><h4>P-02</h4></div>
        </fish-col>
        <fish-col span="2">
          <div class="demo-col demo-col2 "><h4>ปั้มสูบน้ำเสีย 2</h4></div>
        </fish-col>
        <fish-col span="1" offset="1">
          <enhanced-check
            v-model="pumpfailed2_1"
            label="เช้า"
            subClass="primary"
            animate="true"
          ></enhanced-check>
        </fish-col>
        <fish-col span="1">
          <enhanced-check
            v-model="pumpfailed2_2"
            label="บ่าย"
            subClass="primary"
            animate="true"
          ></enhanced-check>
        </fish-col>
        <fish-col span="2">
          <enhanced-check
            v-model="pumpfailed2_3"
            label="ไม่ได้ใช้งาน"
            subClass="danger"
            animate="true"
          ></enhanced-check>
        </fish-col>
        <fish-col span="4" offset="1">
          <div>
            <h4>
              ข. ไม่มีเสียงดัง
            </h4>
          </div>
        </fish-col>
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
            <h4>P-03</h4>
          </div></fish-col
        >
        <fish-col span="2"
          ><div class="demo-col demo-col2 ">
            <h4>ปั้มบ่อปรับสภาพ 1</h4>
          </div></fish-col
        >
        <fish-col span="1" offset="1">
          <enhanced-check
            v-model="pumpadjuct1_1"
            label="เช้า"
            subClass="primary"
            animate="true"
          ></enhanced-check>
        </fish-col>
        <fish-col span="1">
          <enhanced-check
            v-model="pumpadjuct1_2"
            label="บ่าย"
            subClass="primary"
            animate="true"
          ></enhanced-check>
        </fish-col>
        <fish-col span="2">
          <enhanced-check
            v-model="pumpadjuct1_3"
            label="ไม่ได้ใช้งาน"
            subClass="danger"
            animate="true"
          ></enhanced-check>
        </fish-col>
        <fish-col span="4" offset="1">
          <div><h4>ค. ไม่สั้นสะเทือน</h4></div>
        </fish-col>
      </fish-row>
      <fish-row gutter=".5">
        <fish-col span="4"
          ><div class="demo-col demo-col2 ">
            <h4>1. ความสูงของตะกอน</h4>
          </div>
        </fish-col>
        <fish-col span="1"
          ><div class="demo-col demo-col4 "><h4>-</h4></div>
        </fish-col>
        <fish-col span="2">
          <div class="demo-col demo-col4 "><h4>-</h4></div>
        </fish-col>
        <fish-col span="2">
          <div class="demo-col demo-col4 "><h4>-</h4></div>
        </fish-col>
        <fish-col span="2" offset="1">
          <div class="demo-col demo-col2 "><h4>P-04</h4></div>
        </fish-col>
        <fish-col span="2">
          <div class="demo-col demo-col2 "><h4>ปั้มบ่อปรับสภาพ 2</h4></div>
        </fish-col>
        <fish-col span="1" offset="1">
          <enhanced-check
            v-model="pumpadjuct2_1"
            label="เช้า"
            subClass="primary"
            animate="true"
          ></enhanced-check>
        </fish-col>
        <fish-col span="1">
          <enhanced-check
            v-model="pumpadjuct2_2"
            label="บ่าย"
            subClass="primary"
            animate="true"
          ></enhanced-check>
        </fish-col>
        <fish-col span="2">
          <enhanced-check
            v-model="pumpadjuct2_3"
            label="ไม่ได้ใช้งาน"
            subClass="danger"
            animate="true"
          ></enhanced-check>
        </fish-col>
        <fish-col span="4" offset="1"
          ><div><h4>ง. ไม่อุดตัน</h4></div>
        </fish-col>
      </fish-row>
      <fish-row gutter=".5">
        <fish-col span="4"
          ><div class="demo-col demo-col2 ">
            <h5>(0.9-1.25 เมตร)</h5>
          </div>
        </fish-col>
        <fish-col span="1"
          ><div class="demo-col demo-col2 "><h5>บ่อตะกอน</h5></div>
        </fish-col>
        <fish-col span="2">
          <fish-form ref="form">
            <fish-fields>
              <fish-field name="email">
                <fish-input v-model="pondhight1" hint="ผล"></fish-input>
              </fish-field>
            </fish-fields>
          </fish-form>
        </fish-col>
        <fish-col span="2">
          <fish-form ref="form">
            <fish-fields>
              <fish-field name="email">
                <fish-input v-model="pondhight2" hint="ผล"></fish-input>
              </fish-field>
            </fish-fields>
          </fish-form>
        </fish-col>
        <fish-col span="2" offset="1">
          <div class="demo-col demo-col2 "><h4>P-05</h4></div>
        </fish-col>
        <fish-col span="2">
          <div class="demo-col demo-col2 "><h4>ปั้มสูบตะกอน 1</h4></div>
        </fish-col>
        <fish-col span="1" offset="1">
          <enhanced-check
            v-model="pumpsediment1_1"
            label="เช้า"
            subClass="primary"
            animate="true"
          ></enhanced-check>
        </fish-col>
        <fish-col span="1">
          <enhanced-check
            v-model="pumpsediment1_2"
            label="บ่าย"
            subClass="primary"
            animate="true"
          ></enhanced-check>
        </fish-col>
        <fish-col span="2">
          <enhanced-check
            v-model="pumpsediment1_3"
            label="ไม่ได้ใช้งาน"
            subClass="danger"
            animate="true"
          ></enhanced-check>
        </fish-col>
        <fish-col span="4" offset="1">
          <div>
            <h4>
              จ. ระดับจารบีเพียงพอ
            </h4>
          </div>
        </fish-col>
      </fish-row>
      <fish-row gutter=".5">
        <fish-col span="4"
          ><div class="demo-col demo-col2 ">
            <h4>2. สะภาพของตะกอน</h4>
          </div>
        </fish-col>
        <fish-col span="1"
          ><div class="demo-col demo-col4 "><h4>-</h4></div>
        </fish-col>
        <fish-col span="2">
          <div class="demo-col demo-col4 "><h4>-</h4></div>
        </fish-col>
        <fish-col span="2">
          <div class="demo-col demo-col4 "><h4>-</h4></div>
        </fish-col>
        <fish-col span="2" offset="1">
          <div class="demo-col demo-col2 "><h4>P-06</h4></div>
        </fish-col>
        <fish-col span="2">
          <div class="demo-col demo-col2 "><h4>ปั้มสูบตะกอน 2</h4></div>
        </fish-col>
        <fish-col span="1" offset="1">
          <enhanced-check
            v-model="pumpsediment2_1"
            label="เช้า"
            subClass="primary"
            animate="true"
          ></enhanced-check>
        </fish-col>
        <fish-col span="1">
          <enhanced-check
            v-model="pumpsediment2_2"
            label="บ่าย"
            subClass="primary"
            animate="true"
          ></enhanced-check>
        </fish-col>
        <fish-col span="2">
          <enhanced-check
            v-model="pumpsediment2_3"
            label="ไม่ได้ใช้งาน"
            subClass="danger"
            animate="true"
          ></enhanced-check>
        </fish-col>
        <fish-col span="4" offset="1"
          ><div>
            <h4>
              ให้ลงเครื่องหมาย<i class="material-icons white-text">done</i>
            </h4>
          </div>
        </fish-col>
      </fish-row>
      <fish-row gutter=".5">
        <fish-col span="4"
          ><div class="demo-col demo-col2 ">
            <h5>(จมตัวดี,ไม่ลอยตัว)</h5>
          </div>
        </fish-col>
        <fish-col span="1"
          ><div class="demo-col demo-col2 "><h5>บ่อตะกอน</h5></div>
        </fish-col>
        <fish-col span="2">
          <fish-form ref="form">
            <fish-fields>
              <fish-field name="email">
                <fish-input v-model="sediment1" hint="ผล"></fish-input>
              </fish-field>
            </fish-fields>
          </fish-form>
        </fish-col>
        <fish-col span="2">
          <fish-form ref="form">
            <fish-fields>
              <fish-field name="email">
                <fish-input v-model="sediment2" hint="ผล"></fish-input>
              </fish-field>
            </fish-fields>
          </fish-form>
        </fish-col>
        <fish-col span="2" offset="1">
          <div class="demo-col demo-col2 "><h4>P-07</h4></div>
        </fish-col>
        <fish-col span="2">
          <div class="demo-col demo-col2 "><h4>ปั้มคลอรีน 1</h4></div>
        </fish-col>
        <fish-col span="1" offset="1">
          <enhanced-check
            v-model="pumpcrolene1_1"
            label="เช้า"
            subClass="primary"
            animate="true"
          ></enhanced-check>
        </fish-col>
        <fish-col span="1">
          <enhanced-check
            v-model="pumpcrolene1_2"
            label="บ่าย"
            subClass="primary"
            animate="true"
          ></enhanced-check>
        </fish-col>
        <fish-col span="2">
          <enhanced-check
            v-model="pumpcrolene1_3"
            label="ไม่ได้ใช้งาน"
            subClass="danger"
            animate="true"
          ></enhanced-check>
        </fish-col>
        <fish-col span="4" offset="1">
          <div>
            <h4>ถ้าไม่ใช่ปล่อยว่างไว้</h4>
          </div>
        </fish-col>
      </fish-row>
      <fish-divider></fish-divider>
      <fish-row gutter=".5">
        <fish-col span="5">
          <div class="demo-col demo-col3 "><h4>คลองคลอรีน</h4></div>
        </fish-col>
        <fish-col span="5"
          ><div class="demo-col demo-col2"><h4>ผลตรวจ</h4></div></fish-col
        >
        <fish-col span="2">
          <div class="demo-col demo-col2 "><h4>P-08</h4></div>
        </fish-col>
        <fish-col span="2">
          <div class="demo-col demo-col2 "><h4>ปั้มคลอรีน 2</h4></div>
        </fish-col>
        <fish-col span="1" offset="1">
          <enhanced-check
            v-model="pumpcrolene2_1"
            label="เช้า"
            subClass="primary"
            animate="true"
          ></enhanced-check>
        </fish-col>
        <fish-col span="1">
          <enhanced-check
            v-model="pumpcrolene2_2"
            label="บ่าย"
            subClass="primary"
            animate="true"
          ></enhanced-check>
        </fish-col>
        <fish-col span="2">
          <enhanced-check
            v-model="pumpcrolene2_3"
            label="ไม่ได้ใช้งาน"
            subClass="danger"
            animate="true"
          ></enhanced-check>
        </fish-col>
        <fish-col span="4" offset="1">
          <div>
            <h4>
              ถ้าไม่ได้ใช้งานลง<i class="material-icons white-text">done</i
              >ไม่ได้ใช้งาน
            </h4>
          </div>
        </fish-col>
      </fish-row>
    </fish-card>
  </div></template
>
<script>
import { EnhancedCheck } from "vue-enhanced-check";
export default {
  data() {
    return {
      input: {
        dateservice: "",
        pondcolor1: "",
        pondcolor2: "",
        trap1: "",
        trap2: "",
        trap3: "",
        pumpfailed1_1: "",
        pumpfailed1_2: "",
        pumpfailed1_3: "",
        pumpfailed2_1: "",
        pumpfailed2_2: "",
        pumpfailed2_3: "",
        pumpadjuct1_1: "",
        pumpadjuct1_2: "",
        pumpadjuct1_3: "",
        pumpadjuct2_1: "",
        pumpadjuct2_2: "",
        pumpadjuct2_3: "",
        pondhight1: "",
        pondhight2: "",
        pumpsediment1_1: "",
        pumpsediment1_2: "",
        pumpsediment1_3: "",
        pumpsediment2_1: "",
        pumpsediment2_2: "",
        pumpsediment2_3: "",
        sediment1: "",
        sediment2: "",
        pumpcrolene1_1: "",
        pumpcrolene1_2: "",
        pumpcrolene1_3: "",
        pumpcrolene2_1: "",
        pumpcrolene2_2: "",
        pumpcrolene2_3: "",
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
.demo-col3 {
  background: orange;
}
.demo-col4 {
  background: navy;
}
.head {
  font-family: "Sriracha";
  text-shadow: 4px 4px 4px #aaa;
}
.headsmall {
  font-family: "Sriracha";
  text-shadow: 2px 2px 2px #aaa;
}
.left {
  text-align: left;
}
</style>
