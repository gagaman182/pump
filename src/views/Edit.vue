<template>
  <div>
    <vue-scroll-progress-bar
      @complete="handleComplete"
      height="1rem"
      backgroundColor="navy"
    />
    <fish-row>
      <fish-col span="24">
        <fish-steps size="big">
          <fish-step
            title="ใบตรวจเช็ค"
            active
            description="วิธีการเลือกแบบฟอร์ม"
          ></fish-step>
          <fish-step
            title="เลือกเดือน"
            active
            description="ระบุช่วงเดือนที่จะตรวจเช็ค"
          ></fish-step>
          <fish-step
            title="เลือกเครื่อง/รุ่น"
            active
            description="ระบุหมายเลขเครื่อง / รุ่น"
          ></fish-step>
          <fish-step
            title="เสร็จสิ้น"
            active
            description="ฟอร์มจะแสดงตามช่วงเดือนและเครื่องที่เลือก"
          ></fish-step>
        </fish-steps>
      </fish-col>
    </fish-row>
    <fish-card fluid color="teal">
      <div slot="header">
        <h3 class="head">
          <vue-fontawesome icon="copy" size="2"></vue-fontawesome
          >ใบตรวจเช็คบำรุงรักษา
        </h3>
        <!-- <pre>{{ pump_detail }}</pre>
        <pre>{{ pump_detail[0].wire_1 }}</pre>
        <pre>{{ pump_detail[0].wire_0 }}</pre> -->
      </div>

      <fish-form ref="form">
        <fish-fields>
          <fish-field
            span="6"
            label="ระบุช่วงเดือนบำรุงรักษา"
            name="month"
            :rules="[{ required: true, message: 'วันที่เป็นค่าว่าง' }]"
          >
            <fish-select v-model="month" hint="เลือกเดือน" @change="pumpchange">
              <fish-option index="1" content="1 เดือน"></fish-option>
              <fish-option index="3" content="3 เดือน"></fish-option>
            </fish-select>
          </fish-field>
          <fish-field
            span="6"
            label="หมายเลขเครื่อง / รุ่น"
            name="pump"
            :rules="[
              {
                required: true,
                message: 'รุ่นเป็นค่าว่าง'
              }
            ]"
          >
            <!-- <fish-select v-model="pump" @change="pumpchange" hint="เลือกรุ่น">
              <fish-option
                :index="item.id"
                :content="item.name"
                v-for="item in pumps"
                :key="item.id"
              ></fish-option>
            </fish-select> -->
            <fish-select v-model="install_point" hint="เลือกจุดติดตั้ง">
              <fish-option
                index="1"
                content="ปั้มสูบน้ำเสีย รุ่น PX-1-80-4200"
              ></fish-option>
              <fish-option
                index="2"
                content="เครื่องเติมอากาศ รุ่น KA-100"
              ></fish-option>
              <fish-option
                index="3"
                content="ปั้มสูบน้ำเสีย รุ่น K - 102"
              ></fish-option>
              <fish-option
                index="4"
                content="เครื่องเติมอากาศ รุ่น KA-106"
              ></fish-option>
              <fish-option
                index="5"
                content="ปั้มจ่ายคลอรีน BT5A0232NPB"
              ></fish-option>
              <fish-option index="6" content="ปั้มดูดคลอรีน"></fish-option>
              <fish-option index="7" content="K-80"></fish-option>
              <fish-option index="8" content="เครื่องกวาดตะกอน"></fish-option>
              <fish-option index="9" content="เครื่องดักขยะหยาบ"></fish-option>
            </fish-select>
          </fish-field>

          <fish-field label="สถานที่: " span="6">
            <fish-input
              disabled
              hint="บ่อบำบัดน้ำเสีย"
              v-model="place"
            ></fish-input>
          </fish-field>

          <fish-field
            span="6"
            label="ยี่ห้อ"
            name="pump_brand"
            :rules="[{ required: true, message: 'ยี่ห้อเป็นค่าว่าง' }]"
          >
            <!-- <fish-select v-model="pump_brand" hint="เลือกยี่ห้อ">
              <fish-option
                :index="item.id"
                :content="item.name"
                v-for="item in pumps_brands"
                :key="item.id"
              ></fish-option>
            </fish-select> -->
            <fish-select v-model="pump_brand" hint="เลือกยี่ห้อ">
              <fish-option index="1" content="PXPUMPS"></fish-option>
              <fish-option index="2" content="OXIDZER AERATOR"></fish-option>
              <fish-option index="3" content="ปั้มจ่ายคลอรีน"></fish-option>
              <fish-option index="4" content="SANSO"></fish-option>
              <fish-option index="5" content="SITI"></fish-option>
              <fish-option index="6" content="เครื่องดักขยะหยาบ"></fish-option>
            </fish-select>
          </fish-field>
        </fish-fields>

        <fish-fields>
          <fish-field label="ON" name="on" span="6">
            <fish-select v-model="on" hint="ON">
              <fish-option index="1" content="1"></fish-option>
              <fish-option index="2" content="2"></fish-option>
            </fish-select>
          </fish-field>

          <fish-field label="ID:" name="id" span="6">
            <fish-input v-model="id" hint="ID"></fish-input>
          </fish-field>

          <fish-field
            span="6"
            label="จุดติดตั้ง"
            name="install_point"
            :rules="[{ required: true, message: 'จุดติดตั้งเป็นค่าว่าง' }]"
          >
            <!-- <fish-select v-model="install_point" hint="เลือกจุดติดตั้ง">
              <fish-option
                :index="item.id"
                :content="item.name"
                v-for="item in install_points"
                :key="item.id"
              ></fish-option>
            </fish-select> -->
            <fish-select v-model="install_point" hint="เลือกจุดติดตั้ง">
              <fish-option index="1" content="บ่อรวมน้ำเสีย"></fish-option>
              <fish-option index="2" content="บ่อปรับสภาพน้ำเสีย"></fish-option>
              <fish-option index="3" content="บ่อเติมอากาศ"></fish-option>
              <fish-option index="4" content="จุดเติมคลอรีน"></fish-option>
              <fish-option
                index="5"
                content="บ่อสูบตะกอนย้อนกลับ"
              ></fish-option>
              <fish-option index="6" content="บ่อตกตะกอน"></fish-option>
            </fish-select>
          </fish-field>

          <fish-field
            span="6"
            label="วันที่"
            name="dateservice"
            :rules="[{ required: true, message: 'จุดติดตั้งเป็นค่าว่าง' }]"
          >
            <!-- format from moment js L = DD/MM/YYYY -->
            <fish-date-picker
              v-model="dateservice"
              hint="ระบุวันที่"
              format="L"
            ></fish-date-picker>
          </fish-field>
        </fish-fields>

        <fish-row class="headsmall">
          <fish-col span="5" class="demo-col demo-col2">
            <h4>รายการ</h4>
          </fish-col>
          <fish-col span="6" class="demo-col demo-col2">
            <h4>แนวทางการตรวจเช็ค</h4>
          </fish-col>
          <fish-col span="7" class="demo-col demo-col2">
            <h4>สถานะ</h4>
          </fish-col>
          <fish-col span="6" class="demo-col demo-col2">
            <h4>หมายเหตุ</h4>
          </fish-col>
        </fish-row>
        <!-- แถว1 -->
        <fish-row v-show="p1_show">
          <fish-col span="4">
            <fish-tag index="bottom left" attached="bottom left"
              >รายการ</fish-tag
            >
            <fish-segment style="height: 220px;  position: relative;">
              <h5>
                <vue-fontawesome icon="arrow-right"></vue-fontawesome>
                ชุดสายไฟเครื่องปั้ม
              </h5>
            </fish-segment>
          </fish-col>
          <fish-col span="7">
            <fish-tag index="bottom left" attached="bottom left"
              >แนวทางการตรวจเช็ค</fish-tag
            >
            <fish-segment style="height: 220px;  position: relative;">
              <h5>
                <vue-fontawesome icon="bug"></vue-fontawesome> ดูสภาพของสาย
                จุดจับยึด
              </h5>
            </fish-segment>
          </fish-col>
          <fish-col span="4">
            <fish-tag index="bottom left" attached="bottom left"
              >สถานะ
            </fish-tag>
            <fish-segment style="height: 220px;  position: relative;">
              <enhanced-check
                v-model="wire_1"
                label="พร้อมใช้"
                subClass="primary"
                animate="true"
              ></enhanced-check>
              <fish-divider />

              <enhanced-check
                v-model="wire_3"
                label="สายรั่ว"
                subClass="primary"
                animate="true"
              ></enhanced-check>

              <fish-divider />

              <enhanced-check
                v-model="wire_5"
                label="แจ้งหัวหน้า"
                subClass="primary"
                animate="true"
              ></enhanced-check>
            </fish-segment>
          </fish-col>
          <fish-col span="3">
            <fish-segment style="height: 220px;  position: relative;">
              <enhanced-check
                v-model="wire_2"
                label="สายขาด"
                subClass="primary"
                animate="true"
              ></enhanced-check>
              <fish-divider />

              <enhanced-check
                v-model="wire_4"
                label="เปลี่ยน"
                subClass="primary"
                animate="true"
              ></enhanced-check>
            </fish-segment>
          </fish-col>
          <fish-col span="6">
            <fish-tag index="bottom left" attached="bottom left"
              >หมายเหตุ</fish-tag
            >
            <fish-segment style="height: 220px;  ">
              <fish-input
                type="textarea"
                style="height:100%; width:100%;"
                v-model="wire_other"
                hint="ระบุ"
              ></fish-input>
            </fish-segment>
          </fish-col>
        </fish-row>

        <fish-divider v-show="p1_show" />
        <!-- แถว2 -->
        <fish-row v-show="p2_show">
          <fish-col span="4">
            <fish-tag index="bottom left" attached="bottom left"
              >รายการ</fish-tag
            >
            <fish-segment style="height: 220px;  position: relative;">
              <h5>
                <vue-fontawesome icon="arrow-right"></vue-fontawesome>
                ตรวจสอบการ ทำงานของเครื่อง
              </h5>
            </fish-segment>
          </fish-col>
          <fish-col span="7">
            <fish-tag index="bottom left" attached="bottom left"
              >แนวทางการตรวจเช็ค</fish-tag
            >
            <fish-segment style="height: 220px;  position: relative;">
              <h5>
                <vue-fontawesome icon="bug"></vue-fontawesome>
                ดูปริมาณน้ำที่ออกจากท่อ เมื่อเครื่องทำงาน
              </h5>
            </fish-segment>
          </fish-col>
          <fish-col span="4">
            <fish-tag index="bottom left" attached="bottom left"
              >สถานะ</fish-tag
            >
            <fish-segment style="height: 220px;  position: relative;">
              <enhanced-check
                v-model="service_1"
                label="ปกติ / พร้อมใช้"
                subClass="primary"
                animate="true"
              ></enhanced-check>

              <fish-divider />

              <enhanced-check
                v-model="service_3"
                label="ปานกลาง"
                subClass="primary"
                animate="true"
              ></enhanced-check>

              <fish-divider />

              <enhanced-check
                v-model="service_5"
                label="น้อย"
                subClass="primary"
                animate="true"
              ></enhanced-check>
            </fish-segment>
          </fish-col>
          <fish-col span="3">
            <fish-segment style="height: 220px;  position: relative;">
              <enhanced-check
                v-model="service_2"
                label="ไม่ออก/มีเสียงดัง"
                subClass="primary"
                animate="true"
              ></enhanced-check>
              <fish-divider />

              <enhanced-check
                v-model="service_4"
                label="ทำการซ่อม"
                subClass="primary"
                animate="true"
              ></enhanced-check>

              <fish-divider />

              <enhanced-check
                v-model="service_6"
                label="แจ้งหัวหน้า"
                subClass="primary"
                animate="true"
              ></enhanced-check>
            </fish-segment>
          </fish-col>
          <fish-col span="6">
            <fish-tag index="bottom left" attached="bottom left"
              >หมายเหตุ</fish-tag
            >
            <fish-segment style="height: 220px;  position: relative;">
              <fish-input
                type="textarea"
                style="height:100%; width:100%;"
                v-model="service_other"
                hint="ระบุ"
              ></fish-input>
            </fish-segment>
          </fish-col>
        </fish-row>

        <fish-divider v-show="p2_show" />
        <!-- แถว3 -->
        <fish-row v-show="p3_show">
          <fish-col span="4">
            <fish-tag index="bottom left" attached="bottom left"
              >รายการ</fish-tag
            >
            <fish-segment style="height: 220px;  position: relative;">
              <h5>
                <vue-fontawesome icon="arrow-right"></vue-fontawesome
                >ซีลเครื่องปั้ม
              </h5>
            </fish-segment>
          </fish-col>
          <fish-col span="7">
            <fish-tag index="bottom left" attached="bottom left"
              >แนวทางการตรวจเช็ค</fish-tag
            >
            <fish-segment style="height: 220px;  position: relative;">
              <h5>
                <vue-fontawesome icon="bug"></vue-fontawesome>
                สังเกตุด้วยสายตา ดูว่ามีการรั่วของน้ำ ความซึกหรอ
              </h5>
            </fish-segment>
          </fish-col>
          <fish-col span="4">
            <fish-tag index="bottom left" attached="bottom left"
              >สถานะ</fish-tag
            >
            <fish-segment style="height: 220px;  position: relative;">
              <enhanced-check
                v-model="seal_1"
                label="ปกติ / พร้อมใช้"
                subClass="primary"
                animate="true"
              ></enhanced-check>
              <fish-divider />

              <enhanced-check
                v-model="seal_3"
                label="ชำรุด"
                subClass="primary"
                animate="true"
              ></enhanced-check>
            </fish-segment>
          </fish-col>
          <fish-col span="3">
            <fish-segment style="height: 220px;  position: relative;">
              <enhanced-check
                v-model="seal_2"
                label="มีรอยรั่วซึม"
                subClass="primary"
                animate="true"
              ></enhanced-check>

              <fish-divider />

              <enhanced-check
                v-model="seal_4"
                label="ส่งซ่อมบริษัท"
                subClass="primary"
                animate="true"
              ></enhanced-check>
            </fish-segment>
          </fish-col>
          <fish-col span="6">
            <fish-tag index="bottom left" attached="bottom left"
              >หมายเหตุ</fish-tag
            >
            <fish-segment style="height: 220px;  position: relative;">
              <fish-input
                type="textarea"
                style="height:100%; width:100%;"
                v-model="seal_other"
                hint="ระบุ"
              ></fish-input>
            </fish-segment>
          </fish-col>
        </fish-row>

        <fish-divider v-show="p3_show" />
        <!-- แถว4 -->
        <fish-row v-show="p4_show">
          <fish-col span="4">
            <fish-tag index="bottom left" attached="bottom left"
              >รายการ</fish-tag
            >
            <fish-segment style="height: 220px;  position: relative;">
              <h5>
                <vue-fontawesome icon="arrow-right"></vue-fontawesome>สภาพโดยรวม
                ของเครื่อง
              </h5>
            </fish-segment>
          </fish-col>
          <fish-col span="7">
            <fish-tag index="bottom left" attached="bottom left"
              >แนวทางการตรวจเช็ค</fish-tag
            >
            <fish-segment style="height: 220px;  position: relative;">
              <h5>
                <vue-fontawesome icon="bug"></vue-fontawesome> ดูสี จุดแตกร้าว
                การกัดกรอน น๊อต/สกรู การสั่นสะเทือน
              </h5>
            </fish-segment>
          </fish-col>

          <fish-col span="4">
            <fish-tag index="bottom left" attached="bottom left"
              >สถานะ</fish-tag
            >
            <fish-segment style="height: 220px;  position: relative;">
              <enhanced-check
                v-model="condition_1"
                label="พร้อมใช้"
                subClass="primary"
                animate="true"
              ></enhanced-check>

              <fish-divider />

              <enhanced-check
                v-model="condition_3"
                label="แตกร้าว"
                subClass="primary"
                animate="true"
              ></enhanced-check>

              <fish-divider />

              <enhanced-check
                v-model="condition_5"
                label="ทาสีใหม่"
                subClass="primary"
                animate="true"
              ></enhanced-check>
            </fish-segment>
          </fish-col>
          <fish-col span="3">
            <fish-segment style="height: 220px;  position: relative;">
              <enhanced-check
                v-model="condition_2"
                label="เปลี่ยนน๊อต/สกรู"
                subClass="primary"
                animate="true"
              ></enhanced-check>

              <fish-divider />

              <enhanced-check
                v-model="condition_4"
                label="มีการกัดกร่อน"
                subClass="primary"
                animate="true"
              ></enhanced-check>

              <fish-divider />

              <enhanced-check
                v-model="condition_6"
                label="ส่งซ่อมบริษัท"
                subClass="primary"
                animate="true"
              ></enhanced-check>
            </fish-segment>
          </fish-col>
          <fish-col span="6">
            <fish-tag index="bottom left" attached="bottom left"
              >สถานะ</fish-tag
            >
            <fish-segment style="height: 220px;  position: relative;">
              <fish-input
                type="textarea"
                style="height:100%; width:100%;"
                v-model="condition_other"
                hint="ระบุ"
              ></fish-input>
            </fish-segment>
          </fish-col>
        </fish-row>

        <fish-divider v-show="p4_show" />
        <!-- แถว5 -->
        <fish-row v-show="p5_show">
          <fish-col span="4">
            <fish-tag index="bottom left" attached="bottom left"
              >รายการ</fish-tag
            >
            <fish-segment style="height: 220px;  position: relative;">
              <h5>
                <vue-fontawesome icon="arrow-right"></vue-fontawesome
                >ชุดใบพัดปั้ม
              </h5>
            </fish-segment>
          </fish-col>
          <fish-col span="7">
            <fish-tag index="bottom left" attached="bottom left"
              >แนวทางการตรวจเช็ค</fish-tag
            >
            <fish-segment style="height: 220px;  position: relative;">
              <h5>
                <vue-fontawesome icon="bug"></vue-fontawesome>
                ดูจุดแตกร้าว ซึกหรอ การหมุน การสั่นสะเทือน เสียงดัง การกัดกรอน
              </h5>
            </fish-segment>
          </fish-col>
          <fish-col span="4">
            <fish-tag index="bottom left" attached="bottom left"
              >สถานะ</fish-tag
            >
            <fish-segment style="height: 220px;  position: relative;">
              <enhanced-check
                v-model="propeller_1"
                label="พร้อมใช้"
                subClass="primary"
                animate="true"
              ></enhanced-check>

              <fish-divider />

              <enhanced-check
                v-model="propeller_3"
                label="แตกร้าว"
                subClass="primary"
                animate="true"
              ></enhanced-check>

              <fish-divider />

              <enhanced-check
                v-model="propeller_5"
                label="สึกหรอ"
                subClass="primary"
                animate="true"
              ></enhanced-check>
            </fish-segment>
          </fish-col>
          <fish-col span="3">
            <fish-segment style="height: 220px;  position: relative;">
              <enhanced-check
                v-model="propeller_2"
                label="สั่นสะเทือน/เสียงดัง"
                subClass="primary"
                animate="true"
              ></enhanced-check>

              <fish-divider />

              <enhanced-check
                v-model="propeller_4"
                label="มีการกัดกร่อน"
                subClass="primary"
                animate="true"
              ></enhanced-check>

              <fish-divider />

              <enhanced-check
                v-model="propeller_6"
                label="ส่งซ่อมบริษัท"
                subClass="primary"
                animate="true"
              ></enhanced-check>
            </fish-segment>
          </fish-col>
          <fish-col span="6">
            <fish-tag index="bottom left" attached="bottom left"
              >หมายเหตุ</fish-tag
            >
            <fish-segment style="height: 220px;  position: relative;">
              <fish-input
                type="textarea"
                style="height:100%; width:100%;"
                v-model="propeller_other"
                hint="ระบุ"
              ></fish-input>
            </fish-segment>
          </fish-col>
        </fish-row>

        <fish-divider v-show="p5_show" />
        <!-- แถว6-->
        <fish-row v-show="p6_show">
          <fish-col span="4">
            <fish-tag index="bottom left" attached="bottom left"
              >รายการ</fish-tag
            >
            <fish-segment style="height: 220px;  position: relative;">
              <h5>
                <vue-fontawesome icon="arrow-right"></vue-fontawesome
                >หอยโข่งปั้ม
              </h5>
            </fish-segment>
          </fish-col>
          <fish-col span="7">
            <fish-tag index="bottom left" attached="bottom left"
              >แนวทางการตรวจเช็ค</fish-tag
            >
            <fish-segment style="height: 220px;  position: relative;">
              <h5>
                <vue-fontawesome icon="bug"></vue-fontawesome> ดูจุดแตกร้าว
                ซึกหรอ การกัดกรอน
              </h5>
            </fish-segment>
          </fish-col>
          <fish-col span="4">
            <fish-tag index="bottom left" attached="bottom left"
              >สถานะ</fish-tag
            >
            <fish-segment style="height: 220px;  position: relative;">
              <enhanced-check
                v-model="snail_1"
                label="พร้อมใช้"
                subClass="primary"
                animate="true"
              ></enhanced-check>

              <fish-divider />

              <enhanced-check
                v-model="snail_3"
                label="แตกร้าว"
                subClass="primary"
                animate="true"
              ></enhanced-check>

              <fish-divider />

              <enhanced-check
                v-model="snail_5"
                label="สึกหรอ"
                subClass="primary"
                animate="true"
              ></enhanced-check>
            </fish-segment>
          </fish-col>
          <fish-col span="3">
            <fish-segment style="height: 220px;  position: relative;">
              <enhanced-check
                v-model="snail_2"
                label="มีรอยร้าว"
                subClass="primary"
                animate="true"
              ></enhanced-check>
              <fish-divider />

              <enhanced-check
                v-model="snail_4"
                label="มีการกัดกร่อน"
                subClass="primary"
                animate="true"
              ></enhanced-check>

              <fish-divider />

              <enhanced-check
                v-model="snail_6"
                label="อุดตัน"
                subClass="primary"
                animate="true"
              ></enhanced-check>
            </fish-segment>
          </fish-col>
          <fish-col span="6">
            <fish-tag index="bottom left" attached="bottom left"
              >หมายเหตุ</fish-tag
            >
            <fish-segment style="height: 220px;  position: relative;">
              <fish-input
                type="textarea"
                style="height:100%; width:100%;"
                v-model="snail_other"
                hint="ระบุ"
              ></fish-input>
            </fish-segment>
          </fish-col>
        </fish-row>

        <fish-divider v-show="p6_show" />
        <!-- แถว7-->
        <fish-row v-show="p7_show">
          <fish-col span="4">
            <fish-tag index="bottom left" attached="bottom left"
              >รายการ</fish-tag
            >
            <fish-segment style="height: 220px;  position: relative;">
              <h5>
                <vue-fontawesome icon="arrow-right"></vue-fontawesome
                >ระดับน้ำมันเครื่อง
              </h5>
            </fish-segment>
          </fish-col>
          <fish-col span="7">
            <fish-tag index="bottom left" attached="bottom left"
              >แนวทางการตรวจเช็ค</fish-tag
            >
            <fish-segment style="height: 220px;  position: relative;">
              <h5>
                <vue-fontawesome icon="bug"></vue-fontawesome>
                ดูระดับน้ำมันเครื่อง สีของน้ำมัน
              </h5>
            </fish-segment>
          </fish-col>
          <fish-col span="4">
            <fish-tag index="bottom left" attached="bottom left"
              >สถานะ</fish-tag
            >
            <fish-segment style="height: 220px;  position: relative;">
              <enhanced-check
                v-model="oil_1"
                label="พร้อมใช้"
                subClass="primary"
                animate="true"
              ></enhanced-check>

              <fish-divider />

              <enhanced-check
                v-model="oil_3"
                label="เติม"
                subClass="primary"
                animate="true"
              ></enhanced-check>

              <fish-divider />

              <enhanced-check
                v-model="oil_5"
                label="เปลี่ยน"
                subClass="primary"
                animate="true"
              ></enhanced-check>
            </fish-segment>
          </fish-col>
          <fish-col span="3">
            <fish-segment style="height: 220px;  position: relative;">
              <enhanced-check
                v-model="oil_2"
                label="ต่ำกว่าระดับ"
                subClass="primary"
                animate="true"
              ></enhanced-check>

              <fish-divider />

              <enhanced-check
                v-model="oil_4"
                label="สีดำ/ค้น"
                subClass="primary"
                animate="true"
              ></enhanced-check>
            </fish-segment>
          </fish-col>
          <fish-col span="6">
            <fish-tag index="bottom left" attached="bottom left"
              >หมายเหตุ</fish-tag
            >
            <fish-segment style="height: 220px;  position: relative;">
              <fish-input
                type="textarea"
                style="height:100%; width:100%;"
                v-model="oil_other"
                hint="ระบุ"
              ></fish-input>
            </fish-segment>
          </fish-col>
        </fish-row>

        <fish-divider v-show="p7_show" />
        <!-- แถว8-->
        <fish-row v-show="p8_show">
          <fish-col span="4">
            <fish-tag index="bottom left" attached="bottom left"
              >รายการ</fish-tag
            >
            <fish-segment style="height: 220px;  position: relative;">
              <h5>
                <vue-fontawesome icon="arrow-right"></vue-fontawesome>อัดจาระบี
              </h5>
            </fish-segment>
          </fish-col>
          <fish-col span="7">
            <fish-tag index="bottom left" attached="bottom left"
              >แนวทางการตรวจเช็ค</fish-tag
            >
            <fish-segment style="height: 220px;  position: relative;">
              <h5>
                <vue-fontawesome icon="bug"></vue-fontawesome>
                อัดจารบีตามจุดต่างๆ
              </h5>
            </fish-segment>
          </fish-col>
          <fish-col span="4">
            <fish-tag index="bottom left" attached="bottom left"
              >สถานะ</fish-tag
            >
            <fish-segment style="height: 220px;  position: relative;">
              <enhanced-check
                v-model="jarabi_1"
                label="พร้อมใช้"
                subClass="primary"
                animate="true"
              ></enhanced-check>
            </fish-segment>
          </fish-col>
          <fish-col span="3">
            <fish-segment style="height: 220px;  position: relative;">
              <enhanced-check
                v-model="jarabi_2"
                label="อัดจารบี"
                subClass="primary"
                animate="true"
              ></enhanced-check>
            </fish-segment>
          </fish-col>
          <fish-col span="6">
            <fish-tag index="bottom left" attached="bottom left"
              >หมายเหตุ</fish-tag
            >
            <fish-segment style="height: 220px;  position: relative;">
              <fish-input
                type="textarea"
                style="height:100%; width:100%;"
                v-model="jarabi_other"
                hint="ระบุ"
              ></fish-input>
            </fish-segment>
          </fish-col>
        </fish-row>

        <fish-divider v-show="p8_show" />
        <!-- แถว9-->
        <fish-row v-show="p9_show">
          <fish-col span="4">
            <fish-tag index="bottom left" attached="bottom left"
              >รายการ</fish-tag
            >
            <fish-segment style="height: 220px;  position: relative;">
              <h5>
                <vue-fontawesome icon="arrow-right"></vue-fontawesome
                >ทำความสะอาด
              </h5>
            </fish-segment>
          </fish-col>
          <fish-col span="7">
            <fish-tag index="bottom left" attached="bottom left"
              >แนวทางการตรวจเช็ค</fish-tag
            >
            <fish-segment style="height: 220px;  position: relative;">
              <h5>
                <vue-fontawesome icon="bug"></vue-fontawesome> ดูคราบสกปรก
              </h5>
            </fish-segment>
          </fish-col>
          <fish-col span="4">
            <fish-tag index="bottom left" attached="bottom left"
              >สถานะ</fish-tag
            >
            <fish-segment style="height: 220px;  position: relative;">
              <enhanced-check
                v-model="clean_1"
                label="ฉีดน้ำใช้แปรงขัด"
                subClass="primary"
                animate="true"
              ></enhanced-check>

              <fish-divider />

              <enhanced-check
                v-model="clean_3"
                label="ใช้โบว์เวอร์เปา"
                subClass="primary"
                animate="true"
              ></enhanced-check>
            </fish-segment>
          </fish-col>
          <fish-col span="3">
            <fish-segment style="height: 220px;  position: relative;">
              <enhanced-check
                v-model="clean_2"
                label="ใช้ปั้มแรงดัน"
                subClass="primary"
                animate="true"
              ></enhanced-check>

              <fish-divider />

              <enhanced-check
                v-model="clean_4"
                label="ใช้ผ้าชุบน้ำเช็ด"
                subClass="primary"
                animate="true"
              ></enhanced-check>
            </fish-segment>
          </fish-col>
          <fish-col span="6">
            <fish-tag index="bottom left" attached="bottom left"
              >หมายเหตุ</fish-tag
            >
            <fish-segment style="height: 220px;  position: relative;">
              <fish-input
                type="textarea"
                style="height:100%; width:100%;"
                v-model="clean_other"
                hint="ระบุ"
              ></fish-input>
            </fish-segment>
          </fish-col>
        </fish-row>

        <fish-divider v-show="p9_show" />
        <!-- แถว10-->
        <fish-row v-show="p10_show">
          <fish-col span="4">
            <fish-tag index="bottom left" attached="bottom left"
              >รายการ</fish-tag
            >
            <fish-segment style="height: 220px;  position: relative;">
              <h5>
                <vue-fontawesome icon="arrow-right"></vue-fontawesome
                >ชุดแขนของเครื่อง กวาดตะกอน
              </h5>
            </fish-segment>
          </fish-col>
          <fish-col span="7">
            <fish-tag index="bottom left" attached="bottom left"
              >แนวทางการตรวจเช็ค</fish-tag
            >
            <fish-segment style="height: 220px;  position: relative;">
              <h5>
                <vue-fontawesome icon="bug"></vue-fontawesome>
                ดูการหมุนของแขนกวาดตะกอน น๊อต/สกรู การสั่นสะเทือน เสียงดัง
                การกัดกร่อน
              </h5>
            </fish-segment>
          </fish-col>
          <fish-col span="4">
            <fish-tag index="bottom left" attached="bottom left"
              >สถานะ</fish-tag
            >
            <fish-segment style="height: 220px;  position: relative;">
              <enhanced-check
                v-model="arm_1"
                label="พร้อมใช้"
                subClass="primary"
                animate="true"
              ></enhanced-check>

              <fish-divider />

              <enhanced-check
                v-model="arm_3"
                label="ชำรุด"
                subClass="primary"
                animate="true"
              ></enhanced-check>
              <fish-divider />

              <enhanced-check
                v-model="arm_5"
                label="ทาสีใหม่"
                subClass="primary"
                animate="true"
              ></enhanced-check>
            </fish-segment>
          </fish-col>
          <fish-col span="3">
            <fish-segment style="height: 220px;  position: relative;">
              <enhanced-check
                v-model="arm_2"
                label="เปลี่ยนน๊อต/สกรู"
                subClass="primary"
                animate="true"
              ></enhanced-check>

              <fish-divider />

              <enhanced-check
                v-model="arm_4"
                label="สึกหรอ/เป็นสนิม"
                subClass="primary"
                animate="true"
              ></enhanced-check>
            </fish-segment>
          </fish-col>
          <fish-col span="6">
            <fish-tag index="bottom left" attached="bottom left"
              >หมายเหตุ</fish-tag
            >
            <fish-segment style="height: 220px;  position: relative;">
              <fish-input
                type="textarea"
                style="height:100%; width:100%;"
                v-model="arm_other"
                hint="ระบุ"
              ></fish-input>
            </fish-segment>
          </fish-col>
        </fish-row>

        <fish-divider v-show="p10_show" />
        <!-- แถว11-->
        <fish-row v-show="p11_show">
          <fish-col span="4">
            <fish-tag index="bottom left" attached="bottom left"
              >รายการ</fish-tag
            >
            <fish-segment style="height: 250px;  position: relative;">
              <h5>
                <vue-fontawesome icon="arrow-right"></vue-fontawesome
                >ตรวจเช็คระบบ ควบคุมปั้ม
              </h5>
            </fish-segment>
          </fish-col>
          <fish-col span="7">
            <fish-tag index="bottom left" attached="bottom left"
              >แนวทางการตรวจเช็ค</fish-tag
            >
            <fish-segment style="height: 250px;  position: relative;">
              <h5>
                <vue-fontawesome icon="bug"></vue-fontawesome>
                ตรวจเช็คอุปกรณ์/ทำความสะอาด
              </h5>
            </fish-segment>
          </fish-col>
          <fish-col span="4">
            <fish-tag index="bottom left" attached="bottom left"
              >สถานะ</fish-tag
            >
            <fish-segment style="height: 250px;  position: relative;">
              <enhanced-check
                v-model="system_1"
                label="พร้อมใช้"
                subClass="primary"
                animate="true"
              ></enhanced-check>

              <fish-divider />

              <enhanced-check
                v-model="system_3"
                label="เปลี่ยนอุปกรณ์"
                subClass="primary"
                animate="true"
              ></enhanced-check>

              <fish-divider />

              <enhanced-check
                v-model="system_5"
                label="ตรวจเช๊ค AUTO MAN ON OFF ตู้ควบคุม"
                subClass="primary"
                animate="true"
              ></enhanced-check>
            </fish-segment>
          </fish-col>
          <fish-col span="3">
            <fish-segment style="height: 250px;  position: relative;">
              <enhanced-check
                v-model="system_2"
                label="ตรวจเช็คไฟโชว์"
                subClass="primary"
                animate="true"
              ></enhanced-check>

              <fish-divider />

              <enhanced-check
                v-model="system_4"
                label="ใช้โบว์เป้าทำความสะอาด"
                subClass="primary"
                animate="true"
              ></enhanced-check>
            </fish-segment>
          </fish-col>
          <fish-col span="6">
            <fish-tag index="bottom left" attached="bottom left"
              >หมายเหตุ</fish-tag
            >
            <fish-segment style="height: 250px;  position: relative;">
              <fish-input
                type="textarea"
                style="height:100%; width:100%;"
                v-model="system_other"
                hint="ระบุ"
              ></fish-input>
            </fish-segment>
          </fish-col>
        </fish-row>

        <fish-divider v-show="p11_show" />
        <!-- แถว12-->
        <fish-row v-show="p12_show">
          <fish-col span="4">
            <fish-tag index="bottom left" attached="bottom left"
              >รายการ</fish-tag
            >
            <fish-segment style="height: 280px;  position: relative;">
              <h5>
                <vue-fontawesome icon="arrow-right"></vue-fontawesome>ตรวจสอบบ่อ
              </h5>
            </fish-segment>
          </fish-col>
          <fish-col span="7">
            <fish-tag index="bottom left" attached="bottom left"
              >แนวทางการตรวจเช็ค</fish-tag
            >
            <fish-segment style="height: 280px;  position: relative;">
              <h5>
                <vue-fontawesome icon="bug"></vue-fontawesome> ความสกปรก ขยะ
                รอยร้าวของบ่อ สภาพโดยรวม
              </h5>
            </fish-segment>
          </fish-col>
          <fish-col span="4">
            <fish-tag index="bottom left" attached="bottom left"
              >สถานะ</fish-tag
            >

            <fish-segment style="height: 280px;  position: relative;">
              <enhanced-check
                v-model="sump_1"
                label="มีรอยร้าว"
                subClass="primary"
                animate="true"
              ></enhanced-check>
              <fish-divider />

              <enhanced-check
                v-model="sump_3"
                label="ตักเอาขยะออก"
                subClass="primary"
                animate="true"
              ></enhanced-check>
              <fish-divider />

              <enhanced-check
                v-model="sump_5"
                label="ฉีดน้ำใช้แปรงขัด"
                subClass="primary"
                animate="true"
              ></enhanced-check>
              <fish-divider />

              <enhanced-check
                v-model="sump_7"
                label="ใช้ปั้มแรงดันฉีด"
                subClass="primary"
                animate="true"
              ></enhanced-check>
            </fish-segment>
          </fish-col>
          <fish-col span="3">
            <fish-segment style="height: 280px;  position: relative;">
              <enhanced-check
                v-model="sump_2"
                label="แจ้งหัวหน้า"
                subClass="primary"
                animate="true"
              ></enhanced-check>
              <fish-divider />

              <enhanced-check
                v-model="sump_4"
                label="ดูดเลนด้วยไดโว่"
                subClass="primary"
                animate="true"
              ></enhanced-check>
              <fish-divider />

              <enhanced-check
                v-model="sump_6"
                label="ทำการซ่อมแซม"
                subClass="primary"
                animate="true"
              ></enhanced-check>
              <fish-divider />

              <enhanced-check
                v-model="sump_8"
                label="แจ้งบริษัท"
                subClass="primary"
                animate="true"
              ></enhanced-check>
            </fish-segment>
          </fish-col>
          <fish-col span="6">
            <fish-tag index="bottom left" attached="bottom left"
              >สถานะ</fish-tag
            >
            <fish-segment style="height: 280px;  position: relative;">
              <fish-input
                type="textarea"
                style="height:100%; width:100%;"
                v-model="sump_other"
                hint="ระบุ"
              ></fish-input>
            </fish-segment>
          </fish-col>
        </fish-row>
        <fish-divider v-show="p12_show" />
        <!-- แถว13-->
        <fish-row v-show="p13_show">
          <fish-col span="4">
            <fish-tag index="bottom left" attached="bottom left"
              >รายการ</fish-tag
            >
            <fish-segment style="height: 220px;  position: relative;">
              <h5>
                <vue-fontawesome icon="arrow-right"></vue-fontawesome
                >ตรวจเช็คถังคลอรีน จุดต่อสาย
              </h5>
            </fish-segment>
          </fish-col>
          <fish-col span="7">
            <fish-tag index="bottom left" attached="bottom left"
              >แนวทางการตรวจเช็ค</fish-tag
            >
            <fish-segment style="height: 220px;  position: relative;">
              <h5>
                <vue-fontawesome icon="bug"></vue-fontawesome> ดูรอยแตก
                สภาพของถัง จุดต่อของสายคลอรีน
              </h5>
            </fish-segment>
          </fish-col>
          <fish-col span="4">
            <fish-tag index="bottom left" attached="bottom left"
              >สถานะ</fish-tag
            >
            <fish-segment style="height: 220px;  position: relative;">
              <enhanced-check
                v-model="chlorine_1"
                label="พร้อมใช้"
                subClass="primary"
                animate="true"
              ></enhanced-check>
              <fish-divider />

              <enhanced-check
                v-model="chlorine_3"
                label="แตกร้าว"
                subClass="primary"
                animate="true"
              ></enhanced-check>
              <fish-divider />

              <enhanced-check
                v-model="chlorine_5"
                label="มีการกัดกร่อน"
                subClass="primary"
                animate="true"
              ></enhanced-check>
            </fish-segment>
          </fish-col>
          <fish-col span="3">
            <fish-segment style="height: 220px;  position: relative;">
              <enhanced-check
                v-model="chlorine_2"
                label="เปลี่ยนถัง"
                subClass="primary"
                animate="true"
              ></enhanced-check>
              <fish-divider />

              <enhanced-check
                v-model="chlorine_4"
                label="เปลี่ยนสายคลอรีน"
                subClass="primary"
                animate="true"
              ></enhanced-check>
            </fish-segment>
          </fish-col>
          <fish-col span="6">
            <fish-tag index="bottom left" attached="bottom left"
              >หมายเหตุ</fish-tag
            >
            <fish-segment style="height: 220px;  position: relative;">
              <fish-input
                type="textarea"
                style="height:100%; width:100%;"
                v-model="chlorine_other"
                hint="ระบุ"
              ></fish-input>
            </fish-segment>
          </fish-col>
        </fish-row>

        <fish-divider v-show="p13_show" />
        <fish-row>
          <fish-col span="24">
            <fish-card color="teal" fluid>
              <div slot="header">
                <strong class="headsmall">ผู้ปฏิบัติงาน</strong>
              </div>
              <fish-row>
                <fish-col span="8">
                  <h4>ชื่อ-นามสกุล</h4>
                  <fish-input
                    size="large"
                    v-model="woker"
                    hint="ชื่อ-นามสกุล"
                    disabled
                  ></fish-input>
                </fish-col>
                <fish-col span="6">
                  <h4>ยืนยันการตรวจเช็ค</h4>
                  <fish-switch
                    v-model="woker_approve"
                    :yesOrNo="['1', '0']"
                  ></fish-switch>
                </fish-col>
                <fish-col span="8">
                  <h4>หมายเหตุ</h4>
                  <fish-input
                    size="large"
                    type="textarea"
                    style="height: 80px;  width: 100%; "
                    v-model="woker_other"
                    hint="ระบุ"
                  ></fish-input>
                </fish-col>
              </fish-row>
            </fish-card>
          </fish-col>
        </fish-row>
        <br />

        <fish-row>
          <fish-col>
            <fish-fields>
              <fish-field>
                <fish-button type="basic" @click="submitHandler">
                  <vue-fontawesome icon="save" size="2"></vue-fontawesome
                  >บันทึก</fish-button
                >
              </fish-field>
              <fish-field>
                <fish-button type="basic" @click="clear">
                  <vue-fontawesome icon="eraser" size="2"></vue-fontawesome
                  >ยกเลิก</fish-button
                >
              </fish-field>
            </fish-fields>
          </fish-col>
        </fish-row>
      </fish-form>
    </fish-card>
    <br />
    <fish-row>
      <fish-col span="24">
        <fish-card color="teal" fluid>
          <div slot="header"><strong class="headsmall">ผู้ตรวจสอบ</strong></div>
          <fish-card color="orange" fluid>
            <div slot="header">
              <strong class="headsmall">หัวหน้าประปา สุขาภิบาล</strong>
            </div>
            <fish-row>
              <fish-col span="6">
                <h4>ชื่อ-นามสกุล</h4>
                <fish-input
                  size="large"
                  v-model="boss_pump"
                  hint="ชื่อ-นามสกุล"
                  disabled
                ></fish-input>
              </fish-col>
              <fish-col span="6">
                <center>
                  <h4>ตรวจสอบแล้ว</h4>
                  <fish-switch
                    v-model="boss_pump_approve"
                    :yesOrNo="[1, 0]"
                  ></fish-switch>
                </center>
              </fish-col>
              <fish-col span="12">
                <h4>หมายเหตุ</h4>
                <fish-input
                  size="large"
                  type="textarea"
                  style="height: 80px;  width: 100%; "
                  v-model="boss_pump_other"
                  hint="ระบุ"
                ></fish-input>
              </fish-col>
            </fish-row>
          </fish-card>
          <br />

          <fish-cards cols="two">
            <fish-card color="orange">
              <div slot="header">
                <strong class="headsmall">ผู้ตรวจสอบ</strong>
              </div>
              <fish-row>
                <fish-col span="6">
                  <h4>ชื่อ-นามสกุล</h4>
                  <fish-input
                    size="large"
                    v-model="inspector"
                    hint="ชื่อ-นามสกุล"
                    disabled
                  ></fish-input>
                </fish-col>
                <fish-col span="6">
                  <center>
                    <h4>ตรวจสอบแล้ว</h4>
                    <fish-switch
                      v-model="inspector_approve"
                      :yesOrNo="[1, 0]"
                    ></fish-switch>
                  </center>
                </fish-col>
                <fish-col span="12">
                  <h4>หมายเหตุ</h4>
                  <fish-input
                    size="large"
                    type="textarea"
                    style="height: 80px;  width: 100%; "
                    v-model="inspector_other"
                    hint="ระบุ"
                  ></fish-input>
                </fish-col>
              </fish-row>
            </fish-card>
            <fish-card color="orange">
              <div slot="header">
                <strong class="headsmall">รองผู้อำนวยการฝ่ายบริหาร</strong>
              </div>
              <fish-row>
                <fish-col span="6">
                  <h4>ชื่อ-นามสกุล</h4>
                  <fish-input
                    size="large"
                    v-model="manage"
                    hint="ชื่อ-นามสกุล"
                  ></fish-input>
                </fish-col>
                <fish-col span="6">
                  <center>
                    <h4>ตรวจสอบแล้ว</h4>
                    <fish-switch
                      v-model="manage_approve"
                      :yesOrNo="[1, 0]"
                    ></fish-switch>
                  </center>
                </fish-col>
                <fish-col span="12">
                  <h4>หมายเหตุ</h4>
                  <fish-input
                    size="large"
                    type="textarea"
                    style="height: 80px;  width: 100%; "
                    v-model="manage_other"
                    hint="ระบุ"
                  ></fish-input>
                </fish-col>
              </fish-row>
            </fish-card>
          </fish-cards>
          <br />
          <fish-row>
            <fish-col span="2">
              <fish-button type="basic" @click="submitHandler">
                <vue-fontawesome icon="save" size="2"></vue-fontawesome>
                บันทึก</fish-button
              >
            </fish-col>
          </fish-row>
        </fish-card>
      </fish-col>
    </fish-row>
  </div>
</template>

<script>
import axios from "axios";
import { EnhancedCheck } from "vue-enhanced-check";
// import moment from 'moment';
import { APIPath } from "../../service/APIPath";
const apiPath = new APIPath();
export default {
  name: "form",
  components: {
    EnhancedCheck
  },
  data() {
    return {
      tab: "",
      p1_show: true,
      p2_show: true,
      p3_show: true,
      p4_show: true,
      p5_show: true,
      p6_show: true,
      p7_show: true,
      p8_show: true,
      p9_show: true,
      p10_show: true,
      p11_show: true,
      p12_show: true,
      p13_show: true,
      no: false,
      month: "",
      place: "บ่อบำบัดน้ำเสีย",
      pumps_brands: "",
      pump_brand: "",
      on: "",
      pumps: "",
      pump: "",
      id: "",
      install_points: "",
      install_point: "",
      dateservice: "",

      wire_1: "",
      wire_2: "",
      wire_3: "",
      wire_4: "",
      wire_5: "",
      wire_other: "",
      service_1: "",
      service_2: "",
      service_3: "",
      service_4: "",
      service_5: "",
      service_6: "",
      service_other: "",
      seal_1: "",
      seal_2: "",
      seal_3: "",
      seal_4: "",
      seal_other: "",
      condition_1: "",
      condition_2: "",
      condition_3: "",
      condition_4: "",
      condition_5: "",
      condition_6: "",
      condition_other: "",
      propeller_1: "",
      propeller_2: "",
      propeller_3: "",
      propeller_4: "",
      propeller_5: "",
      propeller_6: "",
      propeller_other: "",
      snail_1: "",
      snail_2: "",
      snail_3: "",
      snail_4: "",
      snail_5: "",
      snail_6: "",
      snail_other: "",
      oil_1: "",
      oil_2: "",
      oil_3: "",
      oil_4: "",
      oil_5: "",
      oil_other: "",
      jarabi_1: "",
      jarabi_2: "",
      jarabi_other: "",
      clean_1: "",
      clean_2: "",
      clean_3: "",
      clean_4: "",
      clean_other: "",
      arm_1: "",
      arm_2: "",
      arm_3: "",
      arm_4: "",
      arm_5: "",
      arm_other: "",
      system_1: "",
      system_2: "",
      system_3: "",
      system_4: "",
      system_5: "",
      system_other: "",
      sump_1: "",
      sump_2: "",
      sump_3: "",
      sump_4: "",
      sump_5: "",
      sump_6: "",
      sump_7: "",
      sump_8: "",
      sump_other: "",
      chlorine_1: "",
      chlorine_2: "",
      chlorine_3: "",
      chlorine_4: "",
      chlorine_5: "",
      chlorine_other: "",
      woker: "",
      woker_approve: "",
      woker_other: "",
      boss_pump: "",
      boss_pump_approve: "",
      boss_pump_other: "",
      inspector: "",
      inspector_approve: "",
      inspector_other: "",
      manage: "",
      manage_approve: "",
      manage_other: "",
      ok: "",
      pump_detail: "",
      num: this.$route.params.id,
      pumps_edit: []
    };
  },
  methods: {
    //บันทึกฟอร์มเช็ค
    submitHandler() {
      this.$refs.form.validate(valid => {
        // console.log(valid);
        if (valid === false) {
          this.$message.error("แจ้งเตือน: ท่านยังกรอกข้อมูลไม่ครบ", 5000);
        } else {
          // alert(this.wire_1.split());
          // const wire_1_array = this.wire_1.split();
          axios
            .get(`${apiPath.getBaseUrl()}update_data_detail.php`, {
              params: {
                num: this.num,
                month: this.month,
                place: this.place,
                pump_brand: this.pump_brand,
                on_number: this.on,
                pump: this.pump,
                id: this.id,
                install_point: this.install_point,
                dateservice: this.dateservice,
                wire_1: this.wire_1,
                wire_2: this.wire_2,
                wire_3: this.wire_3,
                wire_4: this.wire_4,
                wire_5: this.wire_5,
                wire_other: this.wire_other,
                service_1: this.service_1,
                service_2: this.service_2,
                service_3: this.service_3,
                service_4: this.service_4,
                service_5: this.service_5,
                service_6: this.service_6,
                service_other: this.service_other,
                seal_1: this.seal_1,
                seal_2: this.seal_2,
                seal_3: this.seal_3,
                seal_4: this.seal_4,
                seal_other: this.seal_other,
                condition_1: this.condition_1,
                condition_2: this.condition_2,
                condition_3: this.condition_3,
                condition_4: this.condition_4,
                condition_5: this.condition_5,
                condition_6: this.condition_6,
                condition_other: this.condition_other,
                propeller_1: this.propeller_1,
                propeller_2: this.propeller_2,
                propeller_3: this.propeller_3,
                propeller_4: this.propeller_4,
                propeller_5: this.propeller_5,
                propeller_6: this.propeller_6,
                propeller_other: this.propeller_other,
                snail_1: this.snail_1,
                snail_2: this.snail_2,
                snail_3: this.snail_3,
                snail_4: this.snail_4,
                snail_5: this.snail_5,
                snail_6: this.snail_6,
                snail_other: this.snail_other,
                oil_1: this.oil_1,
                oil_2: this.oil_2,
                oil_3: this.oil_3,
                oil_4: this.oil_4,
                oil_5: this.oil_5,
                oil_other: this.oil_other,
                jarabi_1: this.jarabi_1,
                jarabi_2: this.jarabi_2,
                jarabi_other: this.jarabi_other,
                clean_1: this.clean_1,
                clean_2: this.clean_2,
                clean_3: this.clean_3,
                clean_4: this.clean_4,
                clean_other: this.clean_other,
                arm_1: this.arm_1,
                arm_2: this.arm_2,
                arm_3: this.arm_3,
                arm_4: this.arm_4,
                arm_5: this.arm_5,
                arm_other: this.arm_other,
                system_1: this.system_1,
                system_2: this.system_2,
                system_3: this.system_3,
                system_4: this.system_4,
                system_5: this.system_5,
                system_other: this.system_other,
                sump_1: this.sump_1,
                sump_2: this.sump_2,
                sump_3: this.sump_3,
                sump_4: this.sump_4,
                sump_5: this.sump_5,
                sump_6: this.sump_6,
                sump_7: this.sump_7,
                sump_8: this.sump_8,
                sump_other: this.sump_other,
                chlorine_1: this.chlorine_1,
                chlorine_2: this.chlorine_2,
                chlorine_3: this.chlorine_3,
                chlorine_4: this.chlorine_4,
                chlorine_5: this.chlorine_5,
                chlorine_other: this.chlorine_other,
                woker: this.woker,
                woker_approve: this.woker_approve,
                woker_other: this.woker_other
              }
            })
            .then(response => {
              this.ok = response.data;

              this.$message.success("สำเร็จ:" + this.ok[0].message, 5000);
              //this.$message.success("สำเร็จ:" + "แก้ไขข้อมูลบุคคลสำเร็จ", 5000);

              this.$router.push("/");
            });
        }
      });
    },

    //เลิอกหมายเลขเครื่อง / รุ่น
    pumpchange() {
      if (this.pump == "1" && this.month == "3") {
        this.p2_show = false;
        this.p8_show = false;
        this.p10_show = false;
        this.p13_show = false;
      } else if (this.pump == "2" && this.month == "3") {
        this.p2_show = false;
        this.p5_show = false;
        this.p6_show = false;
        this.p8_show = false;
        this.p10_show = false;
        this.p13_show = false;
      } else if (this.pump == "3" && this.month == "3") {
        this.p2_show = false;
        this.p8_show = false;
        this.p10_show = false;
        this.p13_show = false;
      } else if (this.pump == "4" && this.month == "3") {
        this.p2_show = false;
        this.p5_show = false;
        this.p6_show = false;
        this.p8_show = false;
        this.p10_show = false;
        this.p13_show = false;
      } else if (this.pump == "5" && this.month == "3") {
        this.p2_show = false;
        this.p5_show = false;
        this.p6_show = false;
        this.p7_show = false;
        this.p8_show = false;
        this.p10_show = false;
        this.p12_show = false;
      } else if (this.pump == "6" && this.month == "3") {
        this.p2_show = false;
        this.p5_show = false;
        this.p6_show = false;
        this.p7_show = false;
        this.p8_show = false;
        this.p10_show = false;
        this.p11_show = false;
        this.p12_show = false;
      } else if (this.pump == "7" && this.month == "3") {
        this.p2_show = false;
        this.p10_show = false;
        this.p13_show = false;
      } else if (this.pump == "8" && this.month == "3") {
        this.p2_show = false;
        this.p3_show = false;
        this.p5_show = false;
        this.p6_show = false;
        this.p13_show = false;
      } else if (this.pump == "9" && this.month == "3") {
        this.p2_show = false;
        this.p3_show = false;
        this.p5_show = false;
        this.p6_show = false;
        this.p7_show = false;
        this.p10_show = false;
        this.p13_show = false;
      } else if (this.pump == "1" && this.month == "1") {
        this.p3_show = false;
        this.p4_show = false;
        this.p5_show = false;
        this.p6_show = false;
        this.p7_show = false;
        this.p8_show = false;
        this.p9_show = false;
        this.p10_show = false;
        this.p13_show = false;
      } else if (this.pump == "2" && this.month == "1") {
        this.p3_show = false;
        this.p4_show = false;
        this.p5_show = false;
        this.p6_show = false;
        this.p7_show = false;
        this.p8_show = false;
        this.p9_show = false;
        this.p10_show = false;
        this.p13_show = false;
      } else if (this.pump == "3" && this.month == "1") {
        this.p3_show = false;
        this.p4_show = false;
        this.p5_show = false;
        this.p6_show = false;
        this.p7_show = false;
        this.p8_show = false;
        this.p9_show = false;
        this.p10_show = false;
        this.p13_show = false;
      } else if (this.pump == "4" && this.month == "1") {
        this.p3_show = false;
        this.p4_show = false;
        this.p5_show = false;
        this.p6_show = false;
        this.p7_show = false;
        this.p8_show = false;
        this.p9_show = false;
        this.p10_show = false;
        this.p13_show = false;
      } else if (this.pump == "5" && this.month == "1") {
        this.p2_show = false;
        this.p5_show = false;
        this.p6_show = false;
        this.p7_show = false;
        this.p8_show = false;
        this.p10_show = false;
        this.p12_show = false;
      } else if (this.pump == "6" && this.month == "1") {
        this.p2_show = false;
        this.p5_show = false;
        this.p6_show = false;
        this.p7_show = false;
        this.p8_show = false;
        this.p10_show = false;
        this.p11_show = false;
        this.p12_show = false;
      } else if (this.pump == "7" && this.month == "1") {
        this.p3_show = false;
        this.p4_show = false;
        this.p5_show = false;
        this.p6_show = false;
        this.p7_show = false;
        this.p8_show = false;
        this.p9_show = false;
        this.p10_show = false;
        this.p13_show = false;
      } else if (this.pump == "8" && this.month == "1") {
        this.p2_show = false;
        this.p3_show = false;
        this.p5_show = false;
        this.p6_show = false;
        this.p13_show = false;
      } else if (this.pump == "9" && this.month == "1") {
        this.p2_show = false;
        this.p3_show = false;
        this.p5_show = false;
        this.p6_show = false;
        this.p7_show = false;
        this.p10_show = false;
        this.p13_show = false;
      } else {
        this.p1_show = true;
        this.p2_show = true;
        this.p3_show = true;
        this.p4_show = true;
        this.p5_show = true;
        this.p6_show = true;
        this.p7_show = true;
        this.p8_show = true;
        this.p9_show = true;
        this.p10_show = true;
        this.p11_show = true;
        this.p12_show = true;
        this.p13_show = true;
      }
    },
    //ดูรายละเอียดใบเช็ค
    getpump(num) {
      axios

        .get(`${apiPath.getBaseUrl()}visit_data_detail.php`, {
          params: { num: num }
        })
        .then(response => {
          this.pump_detail = response.data;
          this.getpump_detail(this.pump_detail);
          this.pumpchange();
        });
    },
    //เอาค่าจาก database มาใส่ใน form
    getpump_detail() {
      this.month = this.pump_detail[0].month;
      this.pump_brand = this.pump_detail[0].p_pump_brand_id;
      this.on = this.pump_detail[0].on_number;
      this.pump = this.pump_detail[0].p_pump_id;
      this.id = this.pump_detail[0].id;
      this.install_point = this.pump_detail[0].install_point_id;
      this.dateservice = this.pump_detail[0].dateservice;
      this.wire_1 = this.pump_detail[0].wire_1;
      this.wire_2 = this.pump_detail[0].wire_2;
      this.wire_3 = this.pump_detail[0].wire_3;
      this.wire_4 = this.pump_detail[0].wire_4;
      this.wire_5 = this.pump_detail[0].wire_5;
      this.wire_other = this.pump_detail[0].wire_other;
      this.service_1 = this.pump_detail[0].service_1;
      this.service_2 = this.pump_detail[0].service_2;
      this.service_3 = this.pump_detail[0].service_3;
      this.service_4 = this.pump_detail[0].service_4;
      this.service_5 = this.pump_detail[0].service_5;
      this.service_6 = this.pump_detail[0].service_6;
      this.service_other = this.pump_detail[0].service_other;
      this.seal_1 = this.pump_detail[0].seal_1;
      this.seal_2 = this.pump_detail[0].seal_2;
      this.seal_3 = this.pump_detail[0].seal_3;
      this.seal_4 = this.pump_detail[0].seal_4;
      this.seal_other = this.pump_detail[0].seal_other;
      this.condition_1 = this.pump_detail[0].condition_1;
      this.condition_2 = this.pump_detail[0].condition_2;
      this.condition_3 = this.pump_detail[0].condition_3;
      this.condition_4 = this.pump_detail[0].condition_4;
      this.condition_5 = this.pump_detail[0].condition_5;
      this.condition_6 = this.pump_detail[0].condition_6;
      this.condition_other = this.pump_detail[0].condition_other;
      this.propeller_1 = this.pump_detail[0].propeller_1;
      this.propeller_2 = this.pump_detail[0].propeller_2;
      this.propeller_3 = this.pump_detail[0].propeller_3;
      this.propeller_4 = this.pump_detail[0].propeller_4;
      this.propeller_5 = this.pump_detail[0].propeller_5;
      this.propeller_6 = this.pump_detail[0].propeller_6;
      this.propeller_other = this.pump_detail[0].propeller_other;
      this.snail_1 = this.pump_detail[0].snail_1;
      this.snail_2 = this.pump_detail[0].snail_2;
      this.snail_3 = this.pump_detail[0].snail_3;
      this.snail_4 = this.pump_detail[0].snail_4;
      this.snail_5 = this.pump_detail[0].snail_5;
      this.snail_6 = this.pump_detail[0].snail_6;
      this.snail_other = this.pump_detail[0].snail_other;
      this.oil_1 = this.pump_detail[0].oil_1;
      this.oil_2 = this.pump_detail[0].oil_2;
      this.oil_3 = this.pump_detail[0].oil_3;
      this.oil_4 = this.pump_detail[0].oil_4;
      this.oil_5 = this.pump_detail[0].oil_5;
      this.oil_other = this.pump_detail[0].oil_other;
      this.jarabi_1 = this.pump_detail[0].jarabi_1;
      this.jarabi_2 = this.pump_detail[0].jarabi_2;
      this.jarabi_other = this.pump_detail[0].jarabi_other;
      this.clean_1 = this.pump_detail[0].clean_1;
      this.clean_2 = this.pump_detail[0].clean_2;
      this.clean_3 = this.pump_detail[0].clean_3;
      this.clean_4 = this.pump_detail[0].clean_4;
      this.clean_other = this.pump_detail[0].clean_other;
      this.arm_1 = this.pump_detail[0].arm_1;
      this.arm_2 = this.pump_detail[0].arm_2;
      this.arm_3 = this.pump_detail[0].arm_3;
      this.arm_4 = this.pump_detail[0].arm_4;
      this.arm_5 = this.pump_detail[0].arm_5;
      this.arm_other = this.pump_detail[0].arm_other;
      this.system_1 = this.pump_detail[0].system_1;
      this.system_2 = this.pump_detail[0].system_2;
      this.system_3 = this.pump_detail[0].system_3;
      this.system_4 = this.pump_detail[0].system_4;
      this.system_5 = this.pump_detail[0].system_5;
      this.system_other = this.pump_detail[0].system_other;
      this.sump_1 = this.pump_detail[0].sump_1;
      this.sump_2 = this.pump_detail[0].sump_2;
      this.sump_3 = this.pump_detail[0].sump_3;
      this.sump_4 = this.pump_detail[0].sump_4;
      this.sump_5 = this.pump_detail[0].sump_5;
      this.sump_6 = this.pump_detail[0].sump_6;
      this.sump_7 = this.pump_detail[0].sump_7;
      this.sump_8 = this.pump_detail[0].sump_8;
      this.sump_other = this.pump_detail[0].sump_other;
      this.chlorine_1 = this.pump_detail[0].chlorine_1;
      this.chlorine_2 = this.pump_detail[0].chlorine_2;
      this.chlorine_3 = this.pump_detail[0].chlorine_3;
      this.chlorine_4 = this.pump_detail[0].chlorine_4;
      this.chlorine_5 = this.pump_detail[0].chlorine_5;
      this.chlorine_other = this.pump_detail[0].chlorine_other;
      this.woker = this.pump_detail[0].woker;
      this.woker_approve = this.pump_detail[0].woker_approve;
      this.woker_other = this.pump_detail[0].woker_other;
    }
  },
  mounted() {
    //ดูรายละเอียดใบเช็ค

    this.getpump(this.num);

    // รุ่น
    axios

      .get(`${apiPath.getBaseUrl()}pump.php`)
      .then(response => (this.pumps = response.data));
    // ยี่ห้อ
    axios

      .get(`${apiPath.getBaseUrl()}pump_brand.php`)
      .then(response => (this.pumps_brands = response.data));
    // จุดติดตั้ง
    axios

      .get(`${apiPath.getBaseUrl()}install_point.php`)
      .then(response => (this.install_points = response.data));
  }
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
  font-family: "Sriracha";
  text-shadow: 4px 4px 4px #aaa;
}
.headsmall {
  font-family: "Sriracha";
  text-shadow: 2px 2px 2px #aaa;
}
</style>
