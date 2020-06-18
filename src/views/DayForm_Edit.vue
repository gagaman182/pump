<template>
  <div>
    <vue-scroll-progress-bar
      @complete="handleComplete"
      height="1rem"
      backgroundColor="navy"
    />
    <Account />
    <fish-card fluid color="teal">
      <div slot="header">
        <h3 class="head">
          <i class="material-icons white-text">store</i
          >แบบบันทึกการตรวจสอบและบำรุงรักษาประจำวัน
        </h3>
      </div>
      <fish-form ref="form" inline>
        <fish-row>
          <fish-col span="23">
            <fish-field
              span="6"
              label="วันที่ตรวจสอบและบำรุงรักษา"
              name="dateservice"
              :rules="[{required: true, message: 'วันที่เป็นค่าว่าง'}]"
            >
              <!-- format from moment js L = DD/MM/YYYY -->
              <fish-date-picker
                v-model="input.dateservice"
                hint="ระบุวันที่"
                format="L"
              ></fish-date-picker> </fish-field
          ></fish-col>

          <fish-col span="1"
            ><H3 class="idcolor">ใบที่. {{ this.input.num }}</H3></fish-col
          >
        </fish-row>
        <fish-divider></fish-divider>

        <fish-row gutter=".5">
          <fish-col span="5"
            ><div class="demo-col demo-col3">
              <h4>บ่อเติมอากาศ</h4>
            </div></fish-col
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
          <fish-col span="3">
            <div class="demo-col demo-col2 "><h4>เครื่องดักขยะบ่อสูบ</h4></div>
          </fish-col>
          <fish-col span="1">
            <enhanced-check
              v-model="input.trap1"
              label="เช้า"
              subClass="primary"
              animate="true"
            ></enhanced-check>
          </fish-col>
          <fish-col span="1">
            <enhanced-check
              v-model="input.trap2"
              label="บ่าย"
              subClass="primary"
              animate="true"
            ></enhanced-check>
          </fish-col>
          <fish-col span="2">
            <enhanced-check
              v-model="input.trap3"
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
            <fish-fields>
              <fish-field>
                <fish-input v-model="input.pondcolor1" hint="ผล"></fish-input>
              </fish-field>
            </fish-fields>
          </fish-col>
          <fish-col span="2">
            <fish-fields>
              <fish-field>
                <fish-input v-model="input.pondcolor2" hint="ผล"></fish-input>
              </fish-field>
            </fish-fields>
          </fish-col>
          <fish-col span="2" offset="1">
            <div class="demo-col demo-col2 "><h4>P-01</h4></div>
          </fish-col>
          <fish-col span="3">
            <div class="demo-col demo-col2 "><h4>ปั้มสูบน้ำเสีย 1</h4></div>
          </fish-col>
          <fish-col span="1">
            <enhanced-check
              v-model="input.pumpfailed1_1"
              label="เช้า"
              subClass="primary"
              animate="true"
            ></enhanced-check>
          </fish-col>
          <fish-col span="1">
            <enhanced-check
              v-model="input.pumpfailed1_2"
              label="บ่าย"
              subClass="primary"
              animate="true"
            ></enhanced-check>
          </fish-col>
          <fish-col span="2">
            <enhanced-check
              v-model="input.pumpfailed1_3"
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
          <fish-col span="3">
            <div class="demo-col demo-col2 "><h4>ปั้มสูบน้ำเสีย 2</h4></div>
          </fish-col>
          <fish-col span="1">
            <enhanced-check
              v-model="input.pumpfailed2_1"
              label="เช้า"
              subClass="primary"
              animate="true"
            ></enhanced-check>
          </fish-col>
          <fish-col span="1">
            <enhanced-check
              v-model="input.pumpfailed2_2"
              label="บ่าย"
              subClass="primary"
              animate="true"
            ></enhanced-check>
          </fish-col>
          <fish-col span="2">
            <enhanced-check
              v-model="input.pumpfailed2_3"
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
          <fish-col span="3"
            ><div class="demo-col demo-col2 ">
              <h4>ปั้มบ่อปรับสภาพ 1</h4>
            </div></fish-col
          >
          <fish-col span="1">
            <enhanced-check
              v-model="input.pumpadjuct1_1"
              label="เช้า"
              subClass="primary"
              animate="true"
            ></enhanced-check>
          </fish-col>
          <fish-col span="1">
            <enhanced-check
              v-model="input.pumpadjuct1_2"
              label="บ่าย"
              subClass="primary"
              animate="true"
            ></enhanced-check>
          </fish-col>
          <fish-col span="2">
            <enhanced-check
              v-model="input.pumpadjuct1_3"
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
          <fish-col span="3">
            <div class="demo-col demo-col2 "><h4>ปั้มบ่อปรับสภาพ 2</h4></div>
          </fish-col>
          <fish-col span="1">
            <enhanced-check
              v-model="input.pumpadjuct2_1"
              label="เช้า"
              subClass="primary"
              animate="true"
            ></enhanced-check>
          </fish-col>
          <fish-col span="1">
            <enhanced-check
              v-model="input.pumpadjuct2_2"
              label="บ่าย"
              subClass="primary"
              animate="true"
            ></enhanced-check>
          </fish-col>
          <fish-col span="2">
            <enhanced-check
              v-model="input.pumpadjuct2_3"
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
            <fish-fields>
              <fish-field>
                <fish-input v-model="input.pondhight1" hint="เมตร"></fish-input>
              </fish-field>
            </fish-fields>
          </fish-col>
          <fish-col span="2">
            <fish-fields>
              <fish-field>
                <fish-input v-model="input.pondhight2" hint="เมตร"></fish-input>
              </fish-field>
            </fish-fields>
          </fish-col>
          <fish-col span="2" offset="1">
            <div class="demo-col demo-col2 "><h4>P-05</h4></div>
          </fish-col>
          <fish-col span="3">
            <div class="demo-col demo-col2 "><h4>ปั้มสูบตะกอน 1</h4></div>
          </fish-col>
          <fish-col span="1">
            <enhanced-check
              v-model="input.pumpsediment1_1"
              label="เช้า"
              subClass="primary"
              animate="true"
            ></enhanced-check>
          </fish-col>
          <fish-col span="1">
            <enhanced-check
              v-model="input.pumpsediment1_2"
              label="บ่าย"
              subClass="primary"
              animate="true"
            ></enhanced-check>
          </fish-col>
          <fish-col span="2">
            <enhanced-check
              v-model="input.pumpsediment1_3"
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
          <fish-col span="3">
            <div class="demo-col demo-col2 "><h4>ปั้มสูบตะกอน 2</h4></div>
          </fish-col>
          <fish-col span="1">
            <enhanced-check
              v-model="input.pumpsediment2_1"
              label="เช้า"
              subClass="primary"
              animate="true"
            ></enhanced-check>
          </fish-col>
          <fish-col span="1">
            <enhanced-check
              v-model="input.pumpsediment2_2"
              label="บ่าย"
              subClass="primary"
              animate="true"
            ></enhanced-check>
          </fish-col>
          <fish-col span="2">
            <enhanced-check
              v-model="input.pumpsediment2_3"
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
            <fish-fields>
              <fish-field>
                <fish-input v-model="input.sediment1" hint="ผล"></fish-input>
              </fish-field>
            </fish-fields>
          </fish-col>
          <fish-col span="2">
            <fish-fields>
              <fish-field>
                <fish-input v-model="input.sediment2" hint="ผล"></fish-input>
              </fish-field>
            </fish-fields>
          </fish-col>
          <fish-col span="2" offset="1">
            <div class="demo-col demo-col2 "><h4>P-07</h4></div>
          </fish-col>
          <fish-col span="3">
            <div class="demo-col demo-col2 "><h4>ปั้มคลอรีน 1</h4></div>
          </fish-col>
          <fish-col span="1">
            <enhanced-check
              v-model="input.pumpcrolene1_1"
              label="เช้า"
              subClass="primary"
              animate="true"
            ></enhanced-check>
          </fish-col>
          <fish-col span="1">
            <enhanced-check
              v-model="input.pumpcrolene1_2"
              label="บ่าย"
              subClass="primary"
              animate="true"
            ></enhanced-check>
          </fish-col>
          <fish-col span="2">
            <enhanced-check
              v-model="input.pumpcrolene1_3"
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
          <fish-col span="3">
            <div class="demo-col demo-col2 "><h4>ปั้มคลอรีน 2</h4></div>
          </fish-col>
          <fish-col span="1">
            <enhanced-check
              v-model="input.pumpcrolene2_1"
              label="เช้า"
              subClass="primary"
              animate="true"
            ></enhanced-check>
          </fish-col>
          <fish-col span="1">
            <enhanced-check
              v-model="input.pumpcrolene2_2"
              label="บ่าย"
              subClass="primary"
              animate="true"
            ></enhanced-check>
          </fish-col>
          <fish-col span="2">
            <enhanced-check
              v-model="input.pumpcrolene2_3"
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
        <fish-row gutter=".5">
          <fish-col span="5"
            ><div class="demo-col demo-col2 ">
              <h4>1. คลอรีนตกค้าง</h4>
            </div>
          </fish-col>

          <fish-col span="2">
            <div class="demo-col demo-col4 "><h4>-</h4></div>
          </fish-col>
          <fish-col span="2">
            <div class="demo-col demo-col4 "><h4>-</h4></div>
          </fish-col>
          <fish-col span="2" offset="1">
            <div class="demo-col demo-col2 "><h4>P-09</h4></div>
          </fish-col>
          <fish-col span="3">
            <div class="demo-col demo-col2 "><h4>โพลีเมอร์ (Polymer)</h4></div>
          </fish-col>
          <fish-col span="1">
            <enhanced-check
              v-model="input.polymer1"
              label="เช้า"
              subClass="primary"
              animate="true"
            ></enhanced-check>
          </fish-col>
          <fish-col span="1">
            <enhanced-check
              v-model="input.polymer2"
              label="บ่าย"
              subClass="primary"
              animate="true"
            ></enhanced-check>
          </fish-col>
          <fish-col span="2">
            <enhanced-check
              v-model="input.polymer3"
              label="ไม่ได้ใช้งาน"
              subClass="danger"
              animate="true"
            ></enhanced-check>
          </fish-col>
          <fish-col span="4" offset="1"
            ><div><h4>2. เมื่อทำความสะอาด</h4></div>
          </fish-col>
        </fish-row>
        <fish-row gutter=".5">
          <fish-col span="5"
            ><div class="demo-col demo-col2 ">
              <h5>(0.5-1.5 ppm)</h5>
            </div>
          </fish-col>

          <fish-col span="2">
            <fish-fields>
              <fish-field>
                <fish-input v-model="input.ppm1" hint="ppm"></fish-input>
              </fish-field>
            </fish-fields>
          </fish-col>
          <fish-col span="2">
            <fish-fields>
              <fish-field>
                <fish-input v-model="input.ppm2" hint="ppm"></fish-input>
              </fish-field>
            </fish-fields>
          </fish-col>
          <fish-col span="2" offset="1">
            <div class="demo-col demo-col2 "><h4>P-10</h4></div>
          </fish-col>
          <fish-col span="3">
            <div class="demo-col demo-col2 ">
              <h5>ปั้มสูบเครื่องรีดตะกอน</h5>
            </div>
          </fish-col>
          <fish-col span="1">
            <enhanced-check
              v-model="input.rolled1"
              label="เช้า"
              subClass="primary"
              animate="true"
            ></enhanced-check>
          </fish-col>
          <fish-col span="1">
            <enhanced-check
              v-model="input.rolled2"
              label="บ่าย"
              subClass="primary"
              animate="true"
            ></enhanced-check>
          </fish-col>
          <fish-col span="2">
            <enhanced-check
              v-model="input.rolled3"
              label="ไม่ได้ใช้งาน"
              subClass="danger"
              animate="true"
            ></enhanced-check>
          </fish-col>
          <fish-col span="4" offset="1">
            <div>
              <h4>
                แล้วให้ลงเครื่องหมาย
              </h4>
            </div>
          </fish-col>
        </fish-row>
        <fish-row gutter=".5">
          <fish-col span="5"
            ><div class="demo-col demo-col2 ">
              <h5>2.สภาพน้ำที่ออกจากระบบ(ใส่,ไม่มีตะกอน)</h5>
            </div>
          </fish-col>

          <fish-col span="2">
            <fish-fields>
              <fish-field>
                <fish-input v-model="input.water1" hint="ผล"></fish-input>
              </fish-field>
            </fish-fields>
          </fish-col>
          <fish-col span="2">
            <fish-fields>
              <fish-field>
                <fish-input v-model="input.water2" hint="ผล"></fish-input>
              </fish-field>
            </fish-fields>
          </fish-col>
          <fish-col span="2" offset="1">
            <div class="demo-col demo-col2 "><h4>P-11</h4></div>
          </fish-col>
          <fish-col span="3">
            <div class="demo-col demo-col2 "><h5>ปั้มตะกอนส่วนเกิน</h5></div>
          </fish-col>
          <fish-col span="1">
            <enhanced-check
              v-model="input.pumpexcess1"
              label="เช้า"
              subClass="primary"
              animate="true"
            ></enhanced-check>
          </fish-col>
          <fish-col span="1">
            <enhanced-check
              v-model="input.pumpexcess2"
              label="บ่าย"
              subClass="primary"
              animate="true"
            ></enhanced-check>
          </fish-col>
          <fish-col span="2">
            <enhanced-check
              v-model="input.pumpexcess3"
              label="ไม่ได้ใช้งาน"
              subClass="danger"
              animate="true"
            ></enhanced-check>
          </fish-col>
          <fish-col span="4" offset="1">
            <div>
              <h4>
                3. เมื่อเปลี่ยนน้ำยา
              </h4>
            </div>
          </fish-col>
        </fish-row>

        <fish-row gutter=".5">
          <fish-col span="5"
            ><div class="demo-col demo-col2 ">
              <h5>3.เวลาที่น้พเสียสัมผัสคลอรีนก่อนออกระบบ</h5>
            </div>
          </fish-col>

          <fish-col span="2">
            <fish-fields>
              <fish-field>
                <fish-input v-model="input.wastewater1" hint="ผล"></fish-input>
              </fish-field>
            </fish-fields>
          </fish-col>
          <fish-col span="2">
            <fish-fields>
              <fish-field>
                <fish-input v-model="input.wastewater2" hint="ผล"></fish-input>
              </fish-field>
            </fish-fields>
          </fish-col>
          <fish-col span="5" offset="1">
            <div class="demo-col demo-col2 "><h4>เครื่องเติมอากาศ</h4></div>
          </fish-col>
          <fish-col span="4">
            <div class="demo-col demo-col2 "><h4>ตรวจสอบ</h4></div>
          </fish-col>

          <fish-col span="4" offset="1">
            <div>
              <h4>
                คลอรีนทุกครั้งให้
              </h4>
            </div>
          </fish-col>
        </fish-row>
        <fish-divider></fish-divider>
        <fish-row gutter=".5">
          <fish-col span="5"
            ><div class="demo-col demo-col3 ">
              <h5>การวัดมิเตอร์</h5>
            </div>
          </fish-col>

          <fish-col span="5"
            ><div class="demo-col demo-col2 ">
              <h4>เลขที่</h4>
            </div>
          </fish-col>
          <fish-col span="2">
            <div class="demo-col demo-col2 "><h4>A-01</h4></div>
          </fish-col>
          <fish-col span="3">
            <div class="demo-col demo-col4 "><h4>-</h4></div>
          </fish-col>
          <fish-col span="1">
            <div class="demo-col demo-col4 "><h4>-</h4></div>
          </fish-col>
          <fish-col span="1">
            <div class="demo-col demo-col4 "><h4>-</h4></div>
          </fish-col>
          <fish-col span="2">
            <div class="demo-col demo-col4 "><h4>-</h4></div>
          </fish-col>
          <fish-col span="4" offset="1">
            <div>
              <h4>
                ลงบันทึก วัน เดือน ปี
              </h4>
            </div>
          </fish-col>
        </fish-row>

        <fish-row gutter=".5">
          <fish-col span="5"
            ><div class="demo-col demo-col2 ">
              <h4>1. มิเตอร์ไฟฟ้า</h4>
            </div>
          </fish-col>

          <fish-col span="5">
            <fish-fields>
              <fish-field>
                <fish-input v-model="input.meter" hint="ผล"></fish-input>
              </fish-field>
            </fish-fields>
          </fish-col>
          <fish-col span="2">
            <div class="demo-col demo-col2 "><h4>A-02</h4></div>
          </fish-col>
          <fish-col span="3">
            <div class="demo-col demo-col4 "><h4>-</h4></div>
          </fish-col>
          <fish-col span="1">
            <div class="demo-col demo-col4 "><h4>-</h4></div>
          </fish-col>
          <fish-col span="1">
            <div class="demo-col demo-col4 "><h4>-</h4></div>
          </fish-col>
          <fish-col span="2">
            <div class="demo-col demo-col4 "><h4>-</h4></div>
          </fish-col>
          <fish-col span="4" offset="1">
            <div>
              <h4>
                ที่เปลี่ยน
              </h4>
            </div>
          </fish-col>
        </fish-row>

        <fish-row gutter=".5">
          <fish-col span="5"
            ><div class="demo-col demo-col2 ">
              <h4>2. มิเตอร์ปั้มสูบน้ำเสีย 1</h4>
            </div>
          </fish-col>

          <fish-col span="5">
            <fish-fields>
              <fish-field>
                <fish-input v-model="input.meterfailed1" hint="ผล"></fish-input>
              </fish-field>
            </fish-fields>
          </fish-col>
          <fish-col span="2">
            <div class="demo-col demo-col2 "><h4>A-03</h4></div>
          </fish-col>
          <fish-col span="3">
            <div class="demo-col demo-col2 "><h4>บ่อเติมอากาศ 3</h4></div>
          </fish-col>
          <fish-col span="1">
            <enhanced-check
              v-model="input.aeration1_1"
              label="เช้า"
              subClass="primary"
              animate="true"
            ></enhanced-check>
          </fish-col>
          <fish-col span="1">
            <enhanced-check
              v-model="input.aeration1_2"
              label="บ่าย"
              subClass="primary"
              animate="true"
            ></enhanced-check>
          </fish-col>
          <fish-col span="2">
            <enhanced-check
              v-model="input.aeration1_3"
              label="ไม่ได้ใช้งาน"
              subClass="danger"
              animate="true"
            ></enhanced-check>
          </fish-col>
          <fish-col span="4" offset="1">
            <div>
              <h4>
                4. เมื่อวัดหรือทดสอบ
              </h4>
            </div>
          </fish-col>
        </fish-row>

        <fish-row gutter=".5">
          <fish-col span="5"
            ><div class="demo-col demo-col2 ">
              <h4>3. มิเตอร์ปั้มสูบน้ำเสีย 2</h4>
            </div>
          </fish-col>

          <fish-col span="5">
            <fish-fields>
              <fish-field>
                <fish-input v-model="input.meterfailed2" hint="ผล"></fish-input>
              </fish-field>
            </fish-fields>
          </fish-col>
          <fish-col span="2">
            <div class="demo-col demo-col2 "><h4>A-04</h4></div>
          </fish-col>
          <fish-col span="3">
            <div class="demo-col demo-col2 "><h4>บ่อเติมอากาศ 4</h4></div>
          </fish-col>
          <fish-col span="1">
            <enhanced-check
              v-model="input.aeration2_1"
              label="เช้า"
              subClass="primary"
              animate="true"
            ></enhanced-check>
          </fish-col>
          <fish-col span="1">
            <enhanced-check
              v-model="input.aeration2_2"
              label="บ่าย"
              subClass="primary"
              animate="true"
            ></enhanced-check>
          </fish-col>
          <fish-col span="2">
            <enhanced-check
              v-model="input.aeration2_3"
              label="ไม่ได้ใช้งาน"
              subClass="danger"
              animate="true"
            ></enhanced-check>
          </fish-col>
          <fish-col span="4" offset="1">
            <div>
              <h4>
                ค่าต่างๆ ให้ลงใน
              </h4>
            </div>
          </fish-col>
        </fish-row>

        <fish-row gutter=".5">
          <fish-col span="5"
            ><div class="demo-col demo-col2 ">
              <h4>อัตราการสูบน้ำ 08.00 น.มีค่าเท่ากับ</h4>
            </div>
          </fish-col>

          <fish-col span="5">
            <fish-fields>
              <fish-field>
                <fish-input v-model="input.pumping1" hint="ผล"></fish-input>
              </fish-field>
            </fish-fields>
          </fish-col>
          <fish-col span="2">
            <div class="demo-col demo-col2 "><h4>A-05</h4></div>
          </fish-col>
          <fish-col span="3">
            <div class="demo-col demo-col2 "><h4>บ่อปรับสภาพ 1</h4></div>
          </fish-col>
          <fish-col span="1">
            <enhanced-check
              v-model="input.pumpcondition1_1"
              label="เช้า"
              subClass="primary"
              animate="true"
            ></enhanced-check>
          </fish-col>
          <fish-col span="1">
            <enhanced-check
              v-model="input.pumpcondition1_2"
              label="บ่าย"
              subClass="primary"
              animate="true"
            ></enhanced-check>
          </fish-col>
          <fish-col span="2">
            <enhanced-check
              v-model="input.pumpcondition1_3"
              label="ไม่ได้ใช้งาน"
              subClass="danger"
              animate="true"
            ></enhanced-check>
          </fish-col>
          <fish-col span="4" offset="1">
            <div>
              <h4>
                ช่องนั้นๆ
              </h4>
            </div>
          </fish-col>
        </fish-row>
        <fish-row gutter=".5">
          <fish-col span="5"
            ><div class="demo-col demo-col2 ">
              <h4>อัตราการสูบน้ำ 12.00 น.มีค่าเท่ากับ</h4>
            </div>
          </fish-col>

          <fish-col span="5">
            <fish-fields>
              <fish-field>
                <fish-input v-model="input.pumping2" hint="ผล"></fish-input>
              </fish-field>
            </fish-fields>
          </fish-col>
          <fish-col span="2">
            <div class="demo-col demo-col2 "><h4>A-06</h4></div>
          </fish-col>
          <fish-col span="3">
            <div class="demo-col demo-col2 "><h4>บ่อปรับสภาพ 2</h4></div>
          </fish-col>
          <fish-col span="1">
            <enhanced-check
              v-model="input.pumpcondition2_1"
              label="เช้า"
              subClass="primary"
              animate="true"
            ></enhanced-check>
          </fish-col>
          <fish-col span="1">
            <enhanced-check
              v-model="input.pumpcondition2_2"
              label="บ่าย"
              subClass="primary"
              animate="true"
            ></enhanced-check>
          </fish-col>
          <fish-col span="2">
            <enhanced-check
              v-model="input.pumpcondition2_3"
              label="ไม่ได้ใช้งาน"
              subClass="danger"
              animate="true"
            ></enhanced-check>
          </fish-col>
          <fish-col span="4" offset="1">
            <div>
              <h4>
                5. ในแต่ละวัน ถ้ามี
              </h4>
            </div>
          </fish-col>
        </fish-row>

        <fish-row gutter=".5">
          <fish-col span="5"
            ><div class="demo-col demo-col2 ">
              <h4>อัตราการสูบน้ำ 16.00 น.มีค่าเท่ากับ</h4>
            </div>
          </fish-col>

          <fish-col span="5">
            <fish-fields>
              <fish-field>
                <fish-input v-model="input.pumping3" hint="ผล"></fish-input>
              </fish-field>
            </fish-fields>
          </fish-col>
          <fish-col span="5">
            <div class="demo-col demo-col2 "><h4>การทำความสะอาด</h4></div>
          </fish-col>

          <fish-col span="4">
            <div class="demo-col demo-col2 "><h4>ทำ</h4></div>
          </fish-col>

          <fish-col span="4" offset="1">
            <div>
              <h4>
                เหตุการณ์ใดเกิดขึ้น
              </h4>
            </div>
          </fish-col>
        </fish-row>
        <fish-divider></fish-divider>
        <fish-row gutter=".5">
          <fish-col span="10">
            <div class="demo-col demo-col3 "><h4>สภาพภูมิอากาศ</h4></div>
          </fish-col>

          <fish-col span="5">
            <div class="demo-col demo-col2 ">
              <h4>1. ล้างเครื่องดักขยะของบ่อสูบ</h4>
            </div>
          </fish-col>

          <fish-col span="1">
            <enhanced-check
              v-model="input.cleantrap1_1"
              label="เช้า"
              subClass="primary"
              animate="true"
            ></enhanced-check>
          </fish-col>
          <fish-col span="1">
            <enhanced-check
              v-model="input.cleantrap1_2"
              label="บ่าย"
              subClass="primary"
              animate="true"
            ></enhanced-check>
          </fish-col>
          <fish-col span="2">
            <enhanced-check
              v-model="input.cleantrap1_3"
              label="ไม่ได้ใช้งาน"
              subClass="danger"
              animate="true"
            ></enhanced-check>
          </fish-col>
          <fish-col span="4" offset="1">
            <div>
              <h4>
                ให้ลงในช่องบันทึก
              </h4>
            </div>
          </fish-col>
        </fish-row>

        <fish-row gutter=".5">
          <fish-col span="5">
            <div class="demo-col demo-col2 ">
              <h4>-มีฝนตก นานกี่ชม กี่นาที</h4>
            </div>
          </fish-col>
          <fish-col span="5">
            <fish-fields>
              <fish-field>
                <fish-input v-model="input.rainning" hint="ระบุ"></fish-input>
              </fish-field>
            </fish-fields>
          </fish-col>

          <fish-col span="5">
            <div class="demo-col demo-col2 ">
              <h4>2. ล้างเครื่องดักขยะบ่อปรับฯ</h4>
            </div>
          </fish-col>

          <fish-col span="1">
            <enhanced-check
              v-model="input.cleantrap2_1"
              label="เช้า"
              subClass="primary"
              animate="true"
            ></enhanced-check>
          </fish-col>
          <fish-col span="1">
            <enhanced-check
              v-model="input.cleantrap2_2"
              label="บ่าย"
              subClass="primary"
              animate="true"
            ></enhanced-check>
          </fish-col>
          <fish-col span="2">
            <enhanced-check
              v-model="input.cleantrap2_3"
              label="ไม่ได้ใช้งาน"
              subClass="danger"
              animate="true"
            ></enhanced-check>
          </fish-col>
          <fish-col span="4" offset="1">
            <div>
              <h4>
                เพิ่มเติมและโทรแจ้ง
              </h4>
            </div>
          </fish-col>
        </fish-row>

        <fish-row gutter=".5">
          <fish-col span="5">
            <div class="demo-col demo-col2 ">
              <h4>-ปริมาณน้ำฝนที่ตก น้อย,ปานกลาง,มาก</h4>
            </div>
          </fish-col>
          <fish-col span="5">
            <fish-fields>
              <fish-field>
                <fish-input v-model="input.volume" hint="ระบุ"></fish-input>
              </fish-field>
            </fish-fields>
          </fish-col>

          <fish-col span="5">
            <div class="demo-col demo-col2 ">
              <h4>3. เก็บขยะจากบ่อตกตะกอน 1</h4>
            </div>
          </fish-col>

          <fish-col span="1">
            <enhanced-check
              v-model="input.storetrap1_1"
              label="เช้า"
              subClass="primary"
              animate="true"
            ></enhanced-check>
          </fish-col>
          <fish-col span="1">
            <enhanced-check
              v-model="input.storetrap1_2"
              label="บ่าย"
              subClass="primary"
              animate="true"
            ></enhanced-check>
          </fish-col>
          <fish-col span="2">
            <enhanced-check
              v-model="input.storetrap1_3"
              label="ไม่ได้ใช้งาน"
              subClass="danger"
              animate="true"
            ></enhanced-check>
          </fish-col>
          <fish-col span="4" offset="1">
            <div>
              <h4>
                ที่เบอร์ 1925
              </h4>
            </div>
          </fish-col>
        </fish-row>
        <fish-divider></fish-divider>
        <fish-row gutter=".5">
          <fish-col span="5">
            <div class="demo-col demo-col3 "><h4>การตรวจสอบถังคลอรีน</h4></div>
          </fish-col>
          <fish-col span="5">
            <div class="demo-col demo-col2 "><h4>เวลาที่เปลี่ยน</h4></div>
          </fish-col>

          <fish-col span="5">
            <div class="demo-col demo-col2 ">
              <h4>4. เก็บขยะจากบ่อตกตะกอน 2</h4>
            </div>
          </fish-col>

          <fish-col span="1">
            <enhanced-check
              v-model="input.storetrap2_1"
              label="เช้า"
              subClass="primary"
              animate="true"
            ></enhanced-check>
          </fish-col>
          <fish-col span="1">
            <enhanced-check
              v-model="input.storetrap2_2"
              label="บ่าย"
              subClass="primary"
              animate="true"
            ></enhanced-check>
          </fish-col>
          <fish-col span="2">
            <enhanced-check
              v-model="input.storetrap2_3"
              label="ไม่ได้ใช้งาน"
              subClass="danger"
              animate="true"
            ></enhanced-check>
          </fish-col>
          <fish-col span="4" offset="1">
            <div>
              <h4>
                เวชกรรมสังคมทุกครั้ง
              </h4>
            </div>
          </fish-col>
        </fish-row>

        <fish-row gutter=".5">
          <fish-col span="5">
            <div class="demo-col demo-col2 ">
              <h4>1. น้ำยาคลอรีนในถัง 1</h4>
            </div>
          </fish-col>
          <fish-col span="5">
            <fish-time-picker
              v-model="input.chlorineintank1"
              hint="ระบุเวลา"
            ></fish-time-picker>
          </fish-col>

          <fish-col span="5">
            <div class="demo-col demo-col2 ">
              <h4>จำนวนขยะต่อวัน (กก)</h4>
            </div>
          </fish-col>

          <fish-col span="8">
            <fish-fields>
              <fish-field>
                <fish-input v-model="input.garbage" hint="กก."></fish-input>
              </fish-field>
            </fish-fields>
          </fish-col>
        </fish-row>

        <fish-row gutter=".5">
          <fish-col span="5">
            <div class="demo-col demo-col2 ">
              <h4>2. น้ำยาคลอรีนในถัง 2</h4>
            </div>
          </fish-col>
          <fish-col span="5">
            <!-- <fish-input v-model="input.chlorineintank2" hint="ระบุ"></fish-input> -->
            <fish-time-picker
              v-model="input.chlorineintank2"
              hint="ระบุเวลา"
            ></fish-time-picker>
          </fish-col>
        </fish-row>
        <fish-row gutter=".5">
          <fish-col span="24">
            <h4>บันทึกเพิ่มเติม</h4>
            <fish-input
              size="large"
              type="textarea"
              style="height: 80px;  width: 100%; "
              v-model="input.others"
              hint="ระบุ"
            ></fish-input>
          </fish-col>
        </fish-row>
        <fish-row gutter=".5">
          <fish-col span="4" offset="21">
            <fish-fields>
              <fish-field style="width: 100%">
                <fish-input
                  v-model="input.woker"
                  label="ผู้ดูแล "
                  hint="ระบุ"
                ></fish-input>
              </fish-field>
            </fish-fields>
          </fish-col>
          <div class="input-wrapper">
            <PincodeInput v-model="input.code" placeholder="0" />
          </div>
        </fish-row>
        <fish-row>
          <fish-col>
            <fish-fields>
              <fish-field>
                <fish-button type="primary" @click="submitHandler">
                  <vue-fontawesome icon="save" size="2"></vue-fontawesome
                  >บันทึก</fish-button
                >
              </fish-field>
              <fish-field>
                <fish-button type="negative" @click="clear">
                  <vue-fontawesome icon="eraser" size="2"></vue-fontawesome
                  >ลบ</fish-button
                >
              </fish-field>
            </fish-fields>
          </fish-col>
        </fish-row>
      </fish-form>
    </fish-card>
  </div>
</template>
<script>
import {EnhancedCheck} from 'vue-enhanced-check';
import axios from 'axios';
import {APIPath} from '../../service/APIPath';
// popup alert
import swal from 'sweetalert';
const apiPath = new APIPath();
import Account from '@/components/Account.vue';
export default {
  name: 'dayform',
  components: {
    EnhancedCheck,
    Account,
  },
  data() {
    return {
      input: {
        num: '',
        dateservice: '',
        trap1: '',
        trap2: '',
        trap3: '',
        pondcolor1: '',
        pondcolor2: '',
        pumpfailed1_1: '',
        pumpfailed1_2: '',
        pumpfailed1_3: '',
        pumpfailed2_1: '',
        pumpfailed2_2: '',
        pumpfailed2_3: '',
        pumpadjuct1_1: '',
        pumpadjuct1_2: '',
        pumpadjuct1_3: '',
        pumpadjuct2_1: '',
        pumpadjuct2_2: '',
        pumpadjuct2_3: '',
        pondhight1: '',
        pondhight2: '',
        pumpsediment1_1: '',
        pumpsediment1_2: '',
        pumpsediment1_3: '',
        pumpsediment2_1: '',
        pumpsediment2_2: '',
        pumpsediment2_3: '',

        sediment1: '',
        sediment2: '',
        pumpcrolene1_1: '',
        pumpcrolene1_2: '',
        pumpcrolene1_3: '',
        pumpcrolene2_1: '',
        pumpcrolene2_2: '',
        pumpcrolene2_3: '',
        polymer1: '',
        polymer2: '',
        polymer3: '',
        ppm1: '',
        ppm2: '',
        rolled1: '',
        rolled2: '',
        rolled3: '',
        water1: '',
        water2: '',
        pumpexcess1: '',
        pumpexcess2: '',
        pumpexcess3: '',
        wastewater1: '',
        wastewater2: '',

        meter: '',
        meterfailed1: '',
        aeration1_1: '',
        aeration1_2: '',
        aeration1_3: '',
        meterfailed2: '',
        aeration2_1: '',
        aeration2_2: '',
        aeration2_3: '',
        pumping1: '',
        pumpcondition1_1: '',
        pumpcondition1_2: '',
        pumpcondition1_3: '',
        pumping2: '',
        pumpcondition2_1: '',
        pumpcondition2_2: '',
        pumpcondition2_3: '',
        pumping3: '',

        cleantrap1_1: '',
        cleantrap1_2: '',
        cleantrap1_3: '',
        rainning: '',
        cleantrap2_1: '',
        cleantrap2_2: '',
        cleantrap2_3: '',
        volume: '',
        storetrap1_1: '',
        storetrap1_2: '',
        storetrap1_3: '',
        storetrap2_1: '',
        storetrap2_2: '',
        storetrap2_3: '',
        chlorineintank1: '',
        garbage: '',
        chlorineintank2: '',

        others: '',
        woker: '',
        ok: '',

        pump_detail: '',
      },
      num: this.$route.params.id,
      romove_message: '',
      form: {
        token: '',
        level: '',
        user: '',
      },
    };
  },

  methods: {
    //บันทึกฟอร์มเช็ค
    submitHandler() {
      if (this.form.level == 'เจ้าหน้าที่') {
        this.input.woker = this.form.user;
        this.$refs.form.validate((valid) => {
          if (valid === false) {
            // this.$message.error('แจ้งเตือน: ท่านยังกรอกข้อมูลไม่ครบ', 5000);
            swal({
              title: 'แจ้งเตือน!',
              text: 'ท่านยังกรอกข้อมูลไม่ครบ!',
              icon: 'error',
              button: 'ปิด',
            });
          } else {
            axios
              .get(`${apiPath.getBaseUrl()}update_dayform_detail.php`, {
                params: {
                  num: this.input.num,
                  dateservice: this.input.dateservice,
                  trap1: this.input.trap1,
                  trap2: this.input.trap2,
                  trap3: this.input.trap3,
                  pondcolor1: this.input.pondcolor1,
                  pondcolor2: this.input.pondcolor2,
                  pumpfailed1_1: this.input.pumpfailed1_1,
                  pumpfailed1_2: this.input.pumpfailed1_2,
                  pumpfailed1_3: this.input.pumpfailed1_3,
                  pumpfailed2_1: this.input.pumpfailed2_1,
                  pumpfailed2_2: this.input.pumpfailed2_2,
                  pumpfailed2_3: this.input.pumpfailed2_3,
                  pumpadjuct1_1: this.input.pumpadjuct1_1,
                  pumpadjuct1_2: this.input.pumpadjuct1_2,
                  pumpadjuct1_3: this.input.pumpadjuct1_3,
                  pumpadjuct2_1: this.input.pumpadjuct2_1,
                  pumpadjuct2_2: this.input.pumpadjuct2_2,
                  pumpadjuct2_3: this.input.pumpadjuct2_3,
                  pondhight1: this.input.pondhight1,
                  pondhight2: this.input.pondhight2,
                  pumpsediment1_1: this.input.pumpsediment1_1,
                  pumpsediment1_2: this.input.pumpsediment1_2,
                  pumpsediment1_3: this.input.pumpsediment1_3,
                  pumpsediment2_1: this.input.pumpsediment2_1,
                  pumpsediment2_2: this.input.pumpsediment2_2,
                  pumpsediment2_3: this.input.pumpsediment2_3,
                  sediment1: this.input.sediment1,
                  sediment2: this.input.sediment2,
                  pumpcrolene1_1: this.input.pumpcrolene1_1,
                  pumpcrolene1_2: this.input.pumpcrolene1_2,
                  pumpcrolene1_3: this.input.pumpcrolene1_3,
                  pumpcrolene2_1: this.input.pumpcrolene2_1,
                  pumpcrolene2_2: this.input.pumpcrolene2_2,
                  pumpcrolene2_3: this.input.pumpcrolene2_3,
                  polymer1: this.input.polymer1,
                  polymer2: this.input.polymer2,
                  polymer3: this.input.polymer3,
                  ppm1: this.input.ppm1,
                  ppm2: this.input.ppm2,
                  rolled1: this.input.rolled1,
                  rolled2: this.input.rolled2,
                  rolled3: this.input.rolled3,
                  water1: this.input.water1,
                  water2: this.input.water2,
                  pumpexcess1: this.input.pumpexcess1,
                  pumpexcess2: this.input.pumpexcess2,
                  pumpexcess3: this.input.pumpexcess3,
                  wastewater1: this.input.wastewater1,
                  wastewater2: this.input.wastewater2,
                  meter: this.input.meter,
                  meterfailed1: this.input.meterfailed1,
                  aeration1_1: this.input.aeration1_1,
                  aeration1_2: this.input.aeration1_2,
                  aeration1_3: this.input.aeration1_3,
                  meterfailed2: this.input.meterfailed2,
                  aeration2_1: this.input.aeration2_1,
                  aeration2_2: this.input.aeration2_2,
                  aeration2_3: this.input.aeration2_3,
                  pumping1: this.input.pumping1,
                  pumpcondition1_1: this.input.pumpcondition1_1,
                  pumpcondition1_2: this.input.pumpcondition1_2,
                  pumpcondition1_3: this.input.pumpcondition1_3,
                  pumping2: this.input.pumping2,
                  pumpcondition2_1: this.input.pumpcondition2_1,
                  pumpcondition2_2: this.input.pumpcondition2_2,
                  pumpcondition2_3: this.input.pumpcondition2_3,
                  pumping3: this.input.pumping3,
                  cleantrap1_1: this.input.cleantrap1_1,
                  cleantrap1_2: this.input.cleantrap1_2,
                  cleantrap1_3: this.input.cleantrap1_3,
                  rainning: this.input.rainning,
                  cleantrap2_1: this.input.cleantrap2_1,
                  cleantrap2_2: this.input.cleantrap2_2,
                  cleantrap2_3: this.input.cleantrap2_3,
                  volume: this.input.volume,
                  storetrap1_1: this.input.storetrap1_1,
                  storetrap1_2: this.input.storetrap1_2,
                  storetrap1_3: this.input.storetrap1_3,
                  storetrap2_1: this.input.storetrap2_1,
                  storetrap2_2: this.input.storetrap2_2,
                  storetrap2_3: this.input.storetrap2_3,
                  chlorineintank1: this.input.chlorineintank1,
                  garbage: this.input.garbage,
                  chlorineintank2: this.input.chlorineintank2,
                  others: this.input.others,
                  woker: this.input.woker,
                },
              })
              .then((response) => {
                this.input.ok = response.data;
                if (this.input.ok[0].message == 'แก้ไขข้อมูลสำเร็จ') {
                  // this.$message.success(
                  //   'สำเร็จ: ' + this.input.ok[0].message,
                  //   5000
                  // );
                  swal({
                    title: 'แจ้งเตือน!',
                    text: this.input.ok[0].message,
                    icon: 'success',
                    button: 'ปิด',
                  });
                } else {
                  // this.$message.error('เตือน: ' + this.input.ok[0].message, 5000);
                  swal({
                    title: 'แจ้งเตือน!',
                    text: this.input.ok[0].message,
                    icon: 'error',
                    button: 'ปิด',
                  });
                }
                this.$router.push('/');
              });
          }
        });
      } else {
        swal({
          title: 'แจ้งเตือน!',
          text: 'หน้านี้สำหรับเจ้าหน้าที่ผู้ปฏบัติงาน',
          icon: 'error',
          button: 'ปิด',
        });
      }
    },
    getpump(num) {
      axios

        .get(`${apiPath.getBaseUrl()}dayform_data_detail.php`, {
          params: {num: num},
        })
        .then((response) => {
          this.input.pump_detail = response.data;
          this.getpump_detail(this.input.pump_detail);
        });
    },
    //เอาค่าจาก database มาใส่ใน form
    getpump_detail() {
      this.input.num = this.input.pump_detail[0].num;
      this.input.dateservice = this.input.pump_detail[0].dateservice_format;
      this.input.trap1 = this.input.pump_detail[0].trap1;
      this.input.trap2 = this.input.pump_detail[0].trap2;
      this.input.trap3 = this.input.pump_detail[0].trap3;
      this.input.pondcolor1 = this.input.pump_detail[0].pondcolor1;
      this.input.pondcolor2 = this.input.pump_detail[0].pondcolor2;
      this.input.pumpfailed1_1 = this.input.pump_detail[0].pumpfailed1_1;
      this.input.pumpfailed1_2 = this.input.pump_detail[0].pumpfailed1_2;
      this.input.pumpfailed1_3 = this.input.pump_detail[0].pumpfailed1_3;
      this.input.pumpfailed2_1 = this.input.pump_detail[0].pumpfailed2_1;
      this.input.pumpfailed2_2 = this.input.pump_detail[0].pumpfailed2_2;
      this.input.pumpfailed2_3 = this.input.pump_detail[0].pumpfailed2_3;
      this.input.pumpadjuct1_1 = this.input.pump_detail[0].pumpadjuct1_1;
      this.input.pumpadjuct1_2 = this.input.pump_detail[0].pumpadjuct1_2;
      this.input.pumpadjuct1_3 = this.input.pump_detail[0].pumpadjuct1_3;
      this.input.pumpadjuct2_1 = this.input.pump_detail[0].pumpadjuct2_1;
      this.input.pumpadjuct2_2 = this.input.pump_detail[0].pumpadjuct2_2;
      this.input.pumpadjuct2_3 = this.input.pump_detail[0].pumpadjuct2_3;
      this.input.pondhight1 = this.input.pump_detail[0].pondhight1;
      this.input.pondhight2 = this.input.pump_detail[0].pondhight2;
      this.input.pumpsediment1_1 = this.input.pump_detail[0].pumpsediment1_1;
      this.input.pumpsediment1_2 = this.input.pump_detail[0].pumpsediment1_2;
      this.input.pumpsediment1_3 = this.input.pump_detail[0].pumpsediment1_3;
      this.input.pumpsediment2_1 = this.input.pump_detail[0].pumpsediment2_1;
      this.input.pumpsediment2_2 = this.input.pump_detail[0].pumpsediment2_2;
      this.input.pumpsediment2_3 = this.input.pump_detail[0].pumpsediment2_3;
      this.input.sediment1 = this.input.pump_detail[0].sediment1;
      this.input.sediment2 = this.input.pump_detail[0].sediment2;
      this.input.pumpcrolene1_1 = this.input.pump_detail[0].pumpcrolene1_1;
      this.input.pumpcrolene1_2 = this.input.pump_detail[0].pumpcrolene1_2;
      this.input.pumpcrolene1_3 = this.input.pump_detail[0].pumpcrolene1_3;
      this.input.pumpcrolene2_1 = this.input.pump_detail[0].pumpcrolene2_1;
      this.input.pumpcrolene2_2 = this.input.pump_detail[0].pumpcrolene2_2;
      this.input.pumpcrolene2_3 = this.input.pump_detail[0].pumpcrolene2_3;
      this.input.polymer1 = this.input.pump_detail[0].polymer1;
      this.input.polymer2 = this.input.pump_detail[0].polymer2;
      this.input.polymer3 = this.input.pump_detail[0].polymer3;
      this.input.ppm1 = this.input.pump_detail[0].ppm1;
      this.input.ppm2 = this.input.pump_detail[0].ppm2;
      this.input.rolled1 = this.input.pump_detail[0].rolled1;
      this.input.rolled2 = this.input.pump_detail[0].rolled2;
      this.input.rolled3 = this.input.pump_detail[0].rolled3;
      this.input.water1 = this.input.pump_detail[0].water1;
      this.input.water2 = this.input.pump_detail[0].water2;
      this.input.pumpexcess1 = this.input.pump_detail[0].pumpexcess1;
      this.input.pumpexcess2 = this.input.pump_detail[0].pumpexcess2;
      this.input.pumpexcess3 = this.input.pump_detail[0].pumpexcess3;
      this.input.wastewater1 = this.input.pump_detail[0].wastewater1;
      this.input.wastewater2 = this.input.pump_detail[0].wastewater2;
      this.input.meter = this.input.pump_detail[0].meter;
      this.input.meterfailed1 = this.input.pump_detail[0].meterfailed1;
      this.input.aeration1_1 = this.input.pump_detail[0].aeration1_1;
      this.input.aeration1_2 = this.input.pump_detail[0].aeration1_2;
      this.input.aeration1_3 = this.input.pump_detail[0].aeration1_3;
      this.input.meterfailed2 = this.input.pump_detail[0].meterfailed2;
      this.input.aeration2_1 = this.input.pump_detail[0].aeration2_1;
      this.input.aeration2_2 = this.input.pump_detail[0].aeration2_2;
      this.input.aeration2_3 = this.input.pump_detail[0].aeration2_3;
      this.input.pumping1 = this.input.pump_detail[0].pumping1;
      this.input.pumpcondition1_1 = this.input.pump_detail[0].pumpcondition1_1;
      this.input.pumpcondition1_2 = this.input.pump_detail[0].pumpcondition1_2;
      this.input.pumpcondition1_3 = this.input.pump_detail[0].pumpcondition1_3;
      this.input.pumping2 = this.input.pump_detail[0].pumping2;
      this.input.pumpcondition2_1 = this.input.pump_detail[0].pumpcondition2_1;
      this.input.pumpcondition2_2 = this.input.pump_detail[0].pumpcondition2_2;
      this.input.pumpcondition2_3 = this.input.pump_detail[0].pumpcondition2_3;
      this.input.pumping3 = this.input.pump_detail[0].pumping3;
      this.input.cleantrap1_1 = this.input.pump_detail[0].cleantrap1_1;
      this.input.cleantrap1_2 = this.input.pump_detail[0].cleantrap1_2;
      this.input.cleantrap1_3 = this.input.pump_detail[0].cleantrap1_3;
      this.input.rainning = this.input.pump_detail[0].rainning;
      this.input.cleantrap2_1 = this.input.pump_detail[0].cleantrap2_1;
      this.input.cleantrap2_2 = this.input.pump_detail[0].cleantrap2_2;
      this.input.cleantrap2_3 = this.input.pump_detail[0].cleantrap2_3;
      this.input.volume = this.input.pump_detail[0].volume;
      this.input.storetrap1_1 = this.input.pump_detail[0].storetrap1_1;
      this.input.storetrap1_2 = this.input.pump_detail[0].storetrap1_2;
      this.input.storetrap1_3 = this.input.pump_detail[0].storetrap1_3;
      this.input.storetrap2_1 = this.input.pump_detail[0].storetrap2_1;
      this.input.storetrap2_2 = this.input.pump_detail[0].storetrap2_2;
      this.input.storetrap2_3 = this.input.pump_detail[0].storetrap2_3;
      this.input.chlorineintank1 = this.input.pump_detail[0].chlorineintank1;
      this.input.garbage = this.input.pump_detail[0].garbage;
      this.input.chlorineintank2 = this.input.pump_detail[0].chlorineintank2;
      this.input.others = this.input.pump_detail[0].others;
      this.input.woker = this.input.pump_detail[0].woker;
    },
    clear() {
      // alert(this.input.num);
      swal({
        title: 'แจ้งเตือนลบข้อมูล',
        text: 'ท่านแน่ใจว่าจะลบข้อมูล',
        icon: 'warning',
        buttons: true,
        dangerMode: true,
      }).then((willDelete) => {
        if (willDelete) {
          this.removeperson();
          swal('ลบข้อมูลสำเร็จ!', {
            icon: 'success',
            button: 'ปิด',
          });
          this.$router.push('/');
        } else {
          swal({
            text: 'ยกเลิกการลบข้อมูล!',
            icon: 'info',
            button: 'ปิด',
          });
        }
      });
    },
    //ยืนยันการลบ
    removeperson() {
      axios
        .get(`${apiPath.getBaseUrl()}remove_dayform.php`, {
          params: {
            num: this.input.num,
          },
        })
        .then((response) => {
          this.romove_message = response.data;
        });
    },
  },
  mounted() {
    window.scrollTo(0, 0);
    this.getpump(this.num);
    this.form.token = JSON.parse(localStorage.getItem('token'));
    this.form.user = this.form.token[0].fullname;
    this.form.level = this.form.token[0].level;
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
  font-family: 'Sriracha';
  text-shadow: 4px 4px 4px #aaa;
}
.headsmall {
  font-family: 'Sriracha';
  text-shadow: 2px 2px 2px #aaa;
}
.left {
  text-align: left;
}
.idcolor {
  color: orange;
}
</style>
