import React, { FC } from "react";
import { UserEditable } from "@/types/user/UserTypes";
import { Link } from "@inertiajs/react";

interface ManageUsersListItemProps {
    user: UserEditable;
}

const ManageUsersListItem: FC<ManageUsersListItemProps> = ({ user }) => {
    const { name, role_name, id, email, edit_url } = user;

    return (
        <div className="bg-white shadow-md rounded-md pt-2 flex-1 pb-6 hover:ring">
            <Link href={edit_url ? edit_url : ""} key={id}>
                <div className="p-2">
                    <img
                        src={`https://avatar.iran.liara.run/username?size=100`}
                        alt=""
                        className="rounded-full mx-auto"
                    />
                </div>

                <div className="p-2 text-center">
                    <h3 className="text-lg">{name}</h3>
                    <p className="font-semibold">{role_name}</p>
                    <p className="text-sm font-semibold text-gray-600">
                        {email}
                    </p>
                </div>
            </Link>
        </div>
    );
};

export default ManageUsersListItem;
