import React, { useState } from 'react'
import Modal from "react-bootstrap/Modal";
import "bootstrap/dist/css/bootstrap.min.css";


export default function ModalDemo() {
  const [show, setShow] = useState(false);
  return (
    <>
      {/* Delete Modal  */}
      <Modal
        size="sm"
        show={show}
        centered
        aria-labelledby="example-modal-sizes-title-sm"
      >
        <Modal.Body>
          <div className="justify-content-center" align="middle">
            <div>
              <img
                src='/icon/delete-icon.png'
                alt=""
                className="rounded-circle border border-danger p-1"
                width="100px"
                height="100px"
              />
            </div>
            <br />
            <h4>Do you want to Delete?</h4>
            <div className="fs-6">You won't be able to recover it!!</div>
          </div>
          <hr />
          <div align="middle">
            <button
              className="btn btn-secondary m-2"
              onClick={() => setShow(false)}
            >
              Cancel
            </button>
            <button className="btn btn-danger m-2" onClick={() => setShow(false)}>
              Delete
            </button>
          </div>
        </Modal.Body>
      </Modal>
      {/* /Delete Modal  */}

      <button
        className="btn btn-primary"
        onClick={() => setShow(true)}
      >Click Me</button>
    </>
  )
}